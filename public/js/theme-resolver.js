/**
 * Theme Resolver
 * Route-based theme application with auto-contrast calculation
 */

const ROUTE_THEME = {
  '/home'           : 'NU-GUI-product-2',   // Blue (moved from /about)
  '/about'          : 'NU-CRON-product-2',  // Teal/Cyan (moved from /support)
  '/solutions'      : 'NU-SIP-product-1',   // Green (stays the same)
  '/partner-program': 'NU-DATA-product-1',  // Purple/Violet (moved from /home)
  '/contact'        : 'NU-SMS-product-2',   // Orange/Red (stays the same)
  '/support'        : 'NU-CCS-product-2'    // Gold/Amber (moved from /partner-program)
};

// Production flag - set to false to disable debug logging
const DEBUG = false;

function applyPageTheme() {
  // Wait for body to be available
  if (!document.body) {
    setTimeout(applyPageTheme, 10);
    return;
  }
  
  const path = (location.pathname || '/home').replace(/\/$/, '') || '/home';
  const themeId = ROUTE_THEME[path] || 'NU-DATA-product-1';
  
  // Use consistent data attribute strategy - apply both to same element
  document.body.setAttribute('data-theme-id', themeId);
  
  if (DEBUG) {
    console.log('Applied theme:', themeId, 'for path:', path);
  }
  
  setAccentContrast();
}

function toggleTheme() {
  // Use body consistently for theme attributes
  const body = document.body;
  const currentTheme = body.dataset.theme;
  body.dataset.theme = (currentTheme === 'light') ? '' : 'light';
  setAccentContrast();
}

function setAccentContrast() {
  try {
    const cs = getComputedStyle(document.body);
    const c1 = cs.getPropertyValue('--accent').trim();
    const c2 = cs.getPropertyValue('--accent-2').trim();
    
    // Fallback values for missing or invalid accent colors
    const fallbackAccent = '#007bff';
    const fallbackAccent2 = '#0056b3';
    
    // Check for missing or invalid values (must be a valid hex color)
    const isValidHex = c => /^#[0-9A-Fa-f]{6}$/.test(c);
    
    let accent = isValidHex(c1) ? c1 : fallbackAccent;
    let accent2 = isValidHex(c2) ? c2 : fallbackAccent2;
    
    if (!isValidHex(c1) && DEBUG) {
      console.warn(`Accent color '--accent' is missing or invalid. Using fallback: ${fallbackAccent}`);
    }
    if (!isValidHex(c2) && DEBUG) {
      console.warn(`Accent color '--accent-2' is missing or invalid. Using fallback: ${fallbackAccent2}`);
    }
    
    const hexToRgb = h => {
      const x = h.replace('#', '');
      return [0, 2, 4].map(i => parseInt(x.slice(i, i + 2), 16));
    };
    
    const luminance = ([r, g, b]) => {
      const t = [r, g, b].map(v => {
        v /= 255;
        return v <= 0.03928 ? v / 12.92 : Math.pow((v + 0.055) / 1.055, 2.4);
      });
      return 0.2126 * t[0] + 0.7152 * t[1] + 0.0722 * t[2];
    };
    
    const mid = [0, 1, 2].map(i => Math.round((hexToRgb(accent)[i] + hexToRgb(accent2)[i]) / 2));
    const L = luminance(mid);
    const contrastWithWhite = (1.05) / (L + 0.05);
    const contrastWithBlack = (L + 0.05) / (0.05);
    const best = contrastWithWhite >= contrastWithBlack ? '#ffffff' : '#000000';
    
    document.documentElement.style.setProperty('--accent-hero-text', best);
  } catch (e) {
    if (DEBUG) {
      console.error('Error setting accent contrast:', e);
    }
  }
}

// Apply theme immediately when script loads
(function() {
  applyPageTheme();
})();

// Setup toggle button when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
  const t = document.querySelector('[data-theme-toggle]');
  if (t) t.addEventListener('click', toggleTheme);
});