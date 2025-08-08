#!/usr/bin/env node
// scripts/theme-image-audit.mjs
// Crawl source/build folders to find -light / -dark assets and where both are referenced.
// Usage:
//   node scripts/theme-image-audit.mjs --root . --out ./theme-audit
//
// Options:
//   --root <path>      Root directory to scan (default: ".")
//   --out <path>       Output folder for reports (default: "./theme-audit")
//   --light <suffix>   Light suffix (default: "-light")
//   --dark <suffix>    Dark suffix (default: "-dark")
//   --ext <csv>        Extra extensions to scan (default: "")
//
// Exit code: 0 if no mixed refs, 2 if mixed light/dark found.

import fs from "node:fs";
import path from "node:path";
import { fileURLToPath } from "node:url";

const argv = process.argv.slice(2);
function getFlag(name, def = null) {
  const i = argv.indexOf(`--${name}`);
  if (i !== -1 && argv[i + 1] && !argv[i + 1].startsWith("--")) return argv[i + 1];
  return def;
}
function hasFlag(name) { return argv.includes(`--${name}`); }

const ROOT = path.resolve(getFlag("root", "."));
const OUT_DIR = path.resolve(getFlag("out", "./theme-audit"));
const LIGHT_SUFFIX = getFlag("light", "-1");  // Using -1 and -2 pattern from your codebase
const DARK_SUFFIX  = getFlag("dark", "-2");
const EXTRA_EXTS   = (getFlag("ext", "") || "").split(",").map(s => s.trim()).filter(Boolean);

const DEFAULT_EXTS = [
  ".html", ".htm", ".php",
  ".js", ".jsx", ".ts", ".tsx",
  ".css", ".scss", ".sass", ".less",
  ".mdx"
];
const EXTS = [...new Set([...DEFAULT_EXTS, ...EXTRA_EXTS])];

const IGNORE_DIRS = new Set(["node_modules", ".git", ".next", "dist", "out", "build", ".vercel", ".turbo", ".cache", "vendor", "archived"]);

const IMAGE_RE = new RegExp(
  [
    // <img src="...">, <source srcset="..."> (capture URLs)
    String.raw`(?:src|srcset)\s*=\s*["']([^"']+)["']`,
    // CSS url(...) including inline styles / tailwind arbitrary values
    String.raw`url\(\s*["']?([^"')]+)["']?\s*\)`,
    // PHP base_url patterns
    String.raw`base_url\(['"]([^'"]+)['"]\)`,
  ].join("|"),
  "gi"
);

// find any path-like substrings that look like files too
const PATHLIKE_RE = /(["'`])([^"'`]+?\.(?:png|jpe?g|webp|gif|svg|avif))\1/gi;

function walk(dir, files = []) {
  try {
    for (const entry of fs.readdirSync(dir, { withFileTypes: true })) {
      if (entry.isDirectory()) {
        if (IGNORE_DIRS.has(entry.name)) continue;
        walk(path.join(dir, entry.name), files);
      } else {
        const ext = path.extname(entry.name).toLowerCase();
        if (EXTS.includes(ext)) files.push(path.join(dir, entry.name));
      }
    }
  } catch (e) {
    // Skip permission errors
  }
  return files;
}

// Normalize an asset path back to a canonical "pair key" without the light/dark suffix
function pairKeyFromAsset(p) {
  // e.g., /img/logo-1.png -> /img/logo.png
  const dir = path.posix.dirname(p);
  const base = path.posix.basename(p);
  const ext = path.posix.extname(base);
  const name = base.slice(0, base.length - ext.length);

  function stripSuffix(n, suffix) {
    // Strict end match
    if (n.endsWith(suffix)) return n.slice(0, -suffix.length);
    return n;
  }

  const noLight = stripSuffix(name, LIGHT_SUFFIX);
  const noDark  = stripSuffix(noLight, DARK_SUFFIX); // handles either order
  return path.posix.join(dir, `${noDark}${ext}`);
}

function collectMatches(content) {
  const out = new Set();

  // img/src/srcset/url(...)
  for (const m of content.matchAll(IMAGE_RE)) {
    const url = (m[1] || m[2] || m[3] || "").trim();
    if (url) out.add(url);
  }
  // generic "pathlike" occurrences for cases not matched above
  for (const m of content.matchAll(PATHLIKE_RE)) {
    const url = (m[2] || "").trim();
    if (url) out.add(url);
  }
  return Array.from(out);
}

function normalizeUrl(u) {
  // strip query/hash
  const clean = u.split("?")[0].split("#")[0];
  // force posix separators
  return clean.replace(/\\/g, "/");
}

function isThemed(u) {
  // Check for both numbered pattern (1/2) and word pattern (light/dark)
  return u.includes("-1.") || u.includes("-2.") || 
         u.includes("-light") || u.includes("-dark") ||
         u.includes("_light") || u.includes("_dark");
}

function ensureDir(p) { fs.mkdirSync(p, { recursive: true }); }

// --- Main ---
const files = walk(ROOT);
const perFile = [];
const pairs = new Map(); // key -> { light:Set(files), dark:Set(files), examples:Set(paths) }
const missingAssets = new Set();

for (const f of files) {
  const rel = path.relative(ROOT, f);
  let content;
  try {
    content = fs.readFileSync(f, "utf8");
  } catch {
    continue;
  }
  const urls = collectMatches(content).map(normalizeUrl);

  const themed = urls.filter(isThemed);
  if (themed.length === 0) continue;

  // Track references per pair
  const fileReport = { file: rel, light: [], dark: [], both: false, occurrences: [] };

  themed.forEach((u) => {
    const p = u; // already normalized
    const key = pairKeyFromAsset(p);

    const isLight = p.includes("-1.") || p.includes("-light") || p.includes("_light");
    const isDark  = p.includes("-2.") || p.includes("-dark") || p.includes("_dark");

    if (!pairs.has(key)) pairs.set(key, { light: new Set(), dark: new Set(), examples: new Set() });
    const rec = pairs.get(key);
    if (isLight) rec.light.add(rel);
    if (isDark)  rec.dark.add(rel);
    rec.examples.add(p);

    if (isLight) fileReport.light.push(p);
    if (isDark)  fileReport.dark.push(p);

    // Existence check for local/relative paths only
    // (skip http(s) or remote CDNs)
    if (!/^https?:\/\//i.test(p)) {
      const absCandidate = path.resolve(ROOT, p.replace(/^\/+/, "")); // allow root-based
      if (!fs.existsSync(absCandidate)) {
        // Also check in public/assets/images
        const publicPath = path.resolve(ROOT, "public", p.replace(/^\/*(assets\/)?/, "assets/"));
        if (!fs.existsSync(publicPath)) {
          missingAssets.add(p);
        }
      }
    }
  });

  fileReport.both = fileReport.light.length > 0 && fileReport.dark.length > 0;
  fileReport.occurrences = themed;
  perFile.push(fileReport);
}

// Build summary
const mixedPairs = [];
for (const [key, rec] of pairs.entries()) {
  // Check if the same file references both light and dark variants
  const filesWithBoth = new Set();
  rec.light.forEach(f => {
    if (rec.dark.has(f)) filesWithBoth.add(f);
  });
  
  if (filesWithBoth.size > 0) {
    mixedPairs.push({
      pairKey: key,
      filesWithBoth: Array.from(filesWithBoth).sort(),
      lightRefs: Array.from(rec.light).sort(),
      darkRefs: Array.from(rec.dark).sort(),
      exampleAssets: Array.from(rec.examples).sort(),
    });
  }
}

const summary = {
  rootScanned: ROOT,
  timestamp: new Date().toISOString(),
  config: { LIGHT_SUFFIX, DARK_SUFFIX, exts: EXTS },
  totals: {
    filesScanned: files.length,
    filesWithThemedRefs: perFile.length,
    uniquePairsFound: pairs.size,
    mixedPairs: mixedPairs.length,
    missingAssets: missingAssets.size,
  },
};

ensureDir(OUT_DIR);
const jsonPath = path.join(OUT_DIR, "theme-audit.json");
const mdPath   = path.join(OUT_DIR, "theme-audit.md");

// Write JSON
fs.writeFileSync(jsonPath, JSON.stringify({ summary, perFile, mixedPairs, missingAssets: Array.from(missingAssets).sort() }, null, 2), "utf8");

// Write Markdown
const md = [];
md.push(`# Theme Image Audit Report`);
md.push(`- **Root:** \`${summary.rootScanned}\``);
md.push(`- **Generated:** ${summary.timestamp}`);
md.push(`- **Light suffix:** \`${LIGHT_SUFFIX}\`, **Dark suffix:** \`${DARK_SUFFIX}\``);
md.push(`- **Files scanned:** ${summary.totals.filesScanned}`);
md.push(`- **Files with themed refs:** ${summary.totals.filesWithThemedRefs}`);
md.push(`- **Unique pairs:** ${summary.totals.uniquePairsFound}`);
md.push(`- **Files with BOTH light & dark in same file:** ${summary.totals.mixedPairs}`);
md.push(`- **Missing assets:** ${summary.totals.missingAssets}`);
md.push(``);
md.push(`## Files Loading Both Light & Dark (MUST FIX)`);
if (mixedPairs.length === 0) {
  md.push(`✅ None detected.`);
} else {
  mixedPairs.forEach((p, i) => {
    md.push(`### ${i + 1}. \`${p.pairKey}\``);
    md.push(`- **Files loading BOTH variants:**`);
    p.filesWithBoth.forEach(f => md.push(`  - ❌ \`${f}\``));
    md.push(`- Example assets:`);
    p.exampleAssets.forEach(e => md.push(`  - \`${e}\``));
    md.push(``);
  });
}
md.push(``);
md.push(`## All Files With Themed References`);
perFile
  .filter(r => r.both)
  .sort((a,b)=> a.file.localeCompare(b.file))
  .forEach((r) => {
    md.push(`### ❌ \`${r.file}\` (loads both light & dark)`);
    if (r.light.length) { md.push(`- Light images:`); r.light.forEach(u => md.push(`  - \`${u}\``)); }
    if (r.dark.length)  { md.push(`- Dark images:`);  r.dark.forEach(u => md.push(`  - \`${u}\``)); }
    md.push(``);
  });

if (missingAssets.size) {
  md.push(`## Missing Assets (404 errors)`);
  Array.from(missingAssets).sort().forEach(a => md.push(`- ❌ \`${a}\``));
}

fs.writeFileSync(mdPath, md.join("\n"), "utf8");

// Console output
const hasMixed = mixedPairs.length > 0;
console.log(`[theme-image-audit] Report written:
- ${jsonPath}
- ${mdPath}`);
if (hasMixed) {
  console.log(`[theme-image-audit] ❌ Found ${mixedPairs.length} files loading BOTH light and dark variants!`);
  process.exit(2);
} else {
  console.log(`[theme-image-audit] ✅ No mixed pairs detected.`);
}