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

function applyPageTheme() {
  // Wait for body to be available
  if (!document.body) {
    setTimeout(applyPageTheme, 10);
    return;
  }
  
  const path = (location.pathname || '/home').replace(/\/$/, '') || '/home';
  const themeId = ROUTE_THEME[path] || 'NU-DATA-product-1';
  document.body.setAttribute('data-theme-id', themeId);
  console.log('Applied theme:', themeId, 'for path:', path);
  setAccentContrast();
}

function toggleTheme() {
  const html = document.documentElement;
  html.dataset.theme = (html.dataset.theme === 'light') ? '' : 'light';
  setAccentContrast();
}

function setAccentContrast() {
  try {
    const cs = getComputedStyle(document.body);
    const c1 = cs.getPropertyValue('--accent').trim();
    const c2 = cs.getPropertyValue('--accent-2').trim();
    
    if (!c1 || !c2) return;
    
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
    
    const mid = [0, 1, 2].map(i => Math.round((hexToRgb(c1)[i] + hexToRgb(c2)[i]) / 2));
    const L = luminance(mid);
    const contrastWithWhite = (1.05) / (L + 0.05);
    const contrastWithBlack = (L + 0.05) / (0.05);
    const best = contrastWithWhite >= contrastWithBlack ? '#ffffff' : '#000000';
    
    document.documentElement.style.setProperty('--accent-hero-text', best);
  } catch (e) {
    console.error('Error setting accent contrast:', e);
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