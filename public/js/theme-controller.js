/**
 * NU GUI Theme Controller
 * Manages light/dark theme switching across the website
 */

class ThemeController {
    constructor() {
        this.currentTheme = 'light';
        this.themeButton = null;
        
        // Initialize on DOM ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => this.init());
        } else {
            this.init();
        }
    }
    
    init() {
        // Apply saved theme or system preference
        this.applyInitialTheme();
        
        // Setup theme switcher button
        this.setupThemeSwitcher();
        
        // Listen for system theme changes
        this.listenForSystemThemeChanges();
    }
    
    applyInitialTheme() {
        // Always check localStorage first and trust it completely
        const savedTheme = localStorage.getItem('theme');
        
        if (savedTheme) {
            this.currentTheme = savedTheme;
            console.log('Applying saved theme:', savedTheme);
        } else {
            // Default to dark theme only if nothing is saved
            this.currentTheme = 'dark';
            localStorage.setItem('theme', 'dark');
            console.log('No saved theme, defaulting to dark');
        }
        
        // Force apply theme to document
        this.applyTheme(this.currentTheme);
        
        // Double-check after a short delay to ensure it stuck
        setTimeout(() => {
            if (document.documentElement.getAttribute('data-theme') !== this.currentTheme) {
                console.log('Theme mismatch detected, reapplying:', this.currentTheme);
                this.applyTheme(this.currentTheme);
            }
        }, 100);
    }
    
    setupThemeSwitcher() {
        this.themeButton = document.getElementById('theme-switcher-nav');
        if (!this.themeButton) return;
        
        // Add click handler
        this.themeButton.addEventListener('click', (e) => {
            e.preventDefault();
            this.toggleTheme();
        });
        
        // Add keyboard support
        this.themeButton.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                this.toggleTheme();
            }
        });
        
        // Update icon
        this.updateThemeIcon();
    }
    
    toggleTheme() {
        const newTheme = this.currentTheme === 'light' ? 'dark' : 'light';
        this.setTheme(newTheme);
        
        // Add a subtle transition effect
        this.addTransitionEffect();
    }
    
    setTheme(theme) {
        this.currentTheme = theme;
        this.applyTheme(theme);
        this.saveThemePreference(theme);
        this.updateThemeIcon();
        
        // Dispatch custom event for other components
        window.dispatchEvent(new CustomEvent('themeChanged', { 
            detail: { theme: theme } 
        }));
    }
    
    applyTheme(theme) {
        // Apply to root element
        document.documentElement.setAttribute('data-theme', theme);
        
        // Update meta theme-color
        const metaThemeColor = document.querySelector('meta[name="theme-color"]');
        if (metaThemeColor) {
            metaThemeColor.content = theme === 'dark' ? '#1a1a1a' : '#FFFFFF';
        }
        
        // Update favicon
        this.updateFavicon(theme);
    }
    
    updateFavicon(theme) {
        const favicon = document.querySelector('link[rel="icon"]');
        if (favicon) {
            const iconNumber = theme === 'dark' ? '2' : '1';
            favicon.href = `/assets/images/NUGUI-icon-${iconNumber}.png`;
        }
    }
    
    updateThemeIcon() {
        if (!this.themeButton) return;
        
        const lightIcon = this.themeButton.querySelector('.theme-icon-light');
        const darkIcon = this.themeButton.querySelector('.theme-icon-dark');
        
        if (this.currentTheme === 'light') {
            lightIcon.style.display = 'block';
            darkIcon.style.display = 'none';
            this.themeButton.setAttribute('aria-label', 'Switch to dark theme');
            this.themeButton.title = 'Switch to dark theme';
        } else {
            lightIcon.style.display = 'none';
            darkIcon.style.display = 'block';
            this.themeButton.setAttribute('aria-label', 'Switch to light theme');
            this.themeButton.title = 'Switch to light theme';
        }
    }
    
    addTransitionEffect() {
        // Add transition class to body
        document.body.style.transition = 'background-color 0.3s ease, color 0.3s ease';
        
        // Remove transition after animation
        setTimeout(() => {
            document.body.style.transition = '';
        }, 300);
    }
    
    saveThemePreference(theme) {
        localStorage.setItem('theme', theme);
    }
    
    listenForSystemThemeChanges() {
        // Disabled - we always use the user's explicit choice from localStorage
        // System preferences should not override user selection
        return;
    }
    
    // Public API
    getTheme() {
        return this.currentTheme;
    }
    
    isDarkMode() {
        return this.currentTheme === 'dark';
    }
}

// Initialize theme controller globally
window.NuGuiTheme = new ThemeController();

// Export for use in other scripts
if (typeof module !== 'undefined' && module.exports) {
    module.exports = ThemeController;
}