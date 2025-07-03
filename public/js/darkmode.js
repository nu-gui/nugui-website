/**
 * Dark mode functionality for NU GUI website
 */

// Theme management
class ThemeManager {
    constructor() {
        this.theme = this.getStoredTheme() || 'dark'; // Default to dark theme
        this.init();
    }
    
    init() {
        this.applyTheme();
        this.bindEvents();
    }
    
    getStoredTheme() {
        return localStorage.getItem('theme');
    }
    
    setStoredTheme(theme) {
        localStorage.setItem('theme', theme);
    }
    
    applyTheme() {
        document.documentElement.classList.toggle('dark', this.theme === 'dark');
        document.body.classList.toggle('dark', this.theme === 'dark');
        this.updateToggleButton();
    }
    
    updateToggleButton() {
        const toggle = document.getElementById('theme-toggle');
        if (toggle) {
            const sunIcon = toggle.querySelector('.sun-icon');
            const moonIcon = toggle.querySelector('.moon-icon');
            
            if (this.theme === 'dark') {
                sunIcon?.classList.add('hidden');
                moonIcon?.classList.remove('hidden');
            } else {
                sunIcon?.classList.remove('hidden');
                moonIcon?.classList.add('hidden');
            }
        }
        
        // Update mobile toggle
        const mobileToggle = document.querySelector('.mobile-dark-mode-toggle');
        if (mobileToggle) {
            const toggleSwitch = mobileToggle.querySelector('.w-12 > div');
            if (toggleSwitch) {
                toggleSwitch.style.transform = this.theme === 'dark' ? 'translateX(1.5rem)' : 'translateX(0)';
            }
        }
    }
    
    toggleTheme() {
        this.theme = this.theme === 'dark' ? 'light' : 'dark';
        this.setStoredTheme(this.theme);
        this.applyTheme();
    }
    
    bindEvents() {
        // Desktop theme toggle
        const toggle = document.getElementById('theme-toggle');
        if (toggle) {
            toggle.addEventListener('click', () => this.toggleTheme());
        }
        
        // Mobile theme toggle
        const mobileToggle = document.querySelector('.mobile-dark-mode-toggle');
        if (mobileToggle) {
            mobileToggle.addEventListener('click', () => this.toggleTheme());
        }
    }
}

// Global toggle function for mobile
function toggleDarkMode() {
    if (window.themeManager) {
        window.themeManager.toggleTheme();
    }
}

// Initialize theme manager when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    window.themeManager = new ThemeManager();
});

// Listen for system theme changes
if (window.matchMedia) {
    const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');
    mediaQuery.addEventListener('change', function(e) {
        if (!localStorage.getItem('theme')) {
            window.themeManager.theme = e.matches ? 'dark' : 'light';
            window.themeManager.applyTheme();
        }
    });
}