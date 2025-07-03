/**
 * Dark Mode Implementation for NU GUI Website
 * Provides seamless light/dark theme switching with system preference detection
 */

class DarkModeController {
    constructor() {
        this.theme = 'light';
        this.init();
    }

    init() {
        this.loadSavedTheme();
        this.setupThemeToggle();
        this.setupSystemThemeListener();
        this.applyTheme(this.theme);
    }

    // Load theme from localStorage or detect system preference
    loadSavedTheme() {
        const savedTheme = localStorage.getItem('nu-gui-theme');
        
        if (savedTheme) {
            this.theme = savedTheme;
        } else {
            // Detect system preference
            this.theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
        }
    }

    // Setup theme toggle button functionality
    setupThemeToggle() {
        const themeToggle = document.getElementById('theme-toggle');
        
        if (themeToggle) {
            themeToggle.addEventListener('click', () => {
                this.toggleTheme();
            });
            
            // Update button icon based on current theme
            this.updateToggleIcon();
        }
    }

    // Listen for system theme changes
    setupSystemThemeListener() {
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
            // Only auto-switch if user hasn't manually set a preference
            if (!localStorage.getItem('nu-gui-theme')) {
                this.theme = e.matches ? 'dark' : 'light';
                this.applyTheme(this.theme);
                this.updateToggleIcon();
            }
        });
    }

    // Toggle between light and dark themes
    toggleTheme() {
        this.theme = this.theme === 'light' ? 'dark' : 'light';
        this.applyTheme(this.theme);
        this.saveTheme();
        this.updateToggleIcon();
        
        // Add visual feedback
        this.showThemeChangeAnimation();
    }

    // Apply the theme to the document
    applyTheme(theme) {
        const root = document.documentElement;
        
        if (theme === 'dark') {
            root.classList.add('dark');
            this.applyDarkModeStyles();
        } else {
            root.classList.remove('dark');
            this.removeDarkModeStyles();
        }
        
        // Dispatch custom event for other components
        window.dispatchEvent(new CustomEvent('themeChange', { detail: { theme } }));
    }

    // Apply dark mode styles dynamically
    applyDarkModeStyles() {
        const style = document.getElementById('dark-mode-styles') || document.createElement('style');
        style.id = 'dark-mode-styles';
        
        style.textContent = `
            .dark {
                color-scheme: dark;
            }
            
            .dark .bg-white {
                background-color: #1f2937 !important;
                color: #f3f4f6 !important;
            }
            
            .dark .bg-gray-50 {
                background-color: #111827 !important;
                color: #f3f4f6 !important;
            }
            
            .dark .bg-gray-100 {
                background-color: #374151 !important;
            }
            
            .dark .text-gray-900 {
                color: #f3f4f6 !important;
            }
            
            .dark .text-gray-800 {
                color: #e5e7eb !important;
            }
            
            .dark .text-gray-700 {
                color: #d1d5db !important;
            }
            
            .dark .text-gray-600 {
                color: #9ca3af !important;
            }
            
            .dark .border-gray-300 {
                border-color: #4b5563 !important;
            }
            
            .dark .border-gray-200 {
                border-color: #374151 !important;
            }
            
            .dark .shadow-xl {
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.5), 0 10px 10px -5px rgba(0, 0, 0, 0.2) !important;
            }
            
            .dark .shadow-lg {
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.5), 0 4px 6px -2px rgba(0, 0, 0, 0.2) !important;
            }
            
            .dark input, .dark textarea {
                background-color: #374151 !important;
                border-color: #4b5563 !important;
                color: #f3f4f6 !important;
            }
            
            .dark input:focus, .dark textarea:focus {
                border-color: #3b82f6 !important;
                box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1) !important;
            }
            
            .dark .bg-green-50 {
                background-color: #064e3b !important;
            }
            
            .dark .bg-red-50 {
                background-color: #7f1d1d !important;
            }
            
            .dark .text-green-800 {
                color: #34d399 !important;
            }
            
            .dark .text-red-800 {
                color: #fca5a5 !important;
            }
            
            .dark .border-green-200 {
                border-color: #065f46 !important;
            }
            
            .dark .border-red-200 {
                border-color: #991b1b !important;
            }
            
            /* Hero gradient adjustments for dark mode */
            .dark .bg-gradient-to-br.from-gray-900.via-blue-900.to-gray-800 {
                background: linear-gradient(to bottom right, #000000, #1e3a8a, #111827) !important;
            }
            
            .dark .bg-gradient-to-br.from-green-50.via-blue-50.to-gray-50 {
                background: linear-gradient(to bottom right, #064e3b, #1e3a8a, #111827) !important;
            }
            
            /* Animation for theme transition */
            * {
                transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease !important;
            }
        `;
        
        if (!document.head.contains(style)) {
            document.head.appendChild(style);
        }
    }

    // Remove dark mode styles
    removeDarkModeStyles() {
        // Keep the transition styles but remove dark-specific overrides
        const style = document.getElementById('dark-mode-styles');
        if (style) {
            style.textContent = `
                * {
                    transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease !important;
                }
            `;
        }
    }

    // Update the theme toggle icon
    updateToggleIcon() {
        const themeToggle = document.getElementById('theme-toggle');
        if (!themeToggle) return;
        
        const icon = themeToggle.querySelector('svg');
        if (!icon) return;
        
        if (this.theme === 'dark') {
            // Moon icon for dark mode
            icon.innerHTML = `
                <path fill-rule="evenodd" d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" clip-rule="evenodd"></path>
            `;
            themeToggle.setAttribute('title', 'Switch to light mode');
        } else {
            // Sun icon for light mode
            icon.innerHTML = `
                <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
            `;
            themeToggle.setAttribute('title', 'Switch to dark mode');
        }
    }

    // Save theme preference to localStorage
    saveTheme() {
        localStorage.setItem('nu-gui-theme', this.theme);
    }

    // Show visual feedback when theme changes
    showThemeChangeAnimation() {
        const body = document.body;
        body.style.transition = 'background-color 0.5s ease';
        
        // Add a subtle flash effect
        const flash = document.createElement('div');
        flash.className = 'fixed inset-0 bg-blue-500 opacity-0 pointer-events-none z-50';
        flash.style.transition = 'opacity 0.2s ease';
        
        body.appendChild(flash);
        
        // Trigger flash animation
        setTimeout(() => {
            flash.style.opacity = '0.1';
            setTimeout(() => {
                flash.style.opacity = '0';
                setTimeout(() => {
                    body.removeChild(flash);
                }, 200);
            }, 100);
        }, 10);
    }

    // Public method to get current theme
    getCurrentTheme() {
        return this.theme;
    }

    // Public method to set theme programmatically
    setTheme(theme) {
        if (theme === 'light' || theme === 'dark') {
            this.theme = theme;
            this.applyTheme(this.theme);
            this.saveTheme();
            this.updateToggleIcon();
        }
    }
}

// Initialize dark mode when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    window.darkModeController = new DarkModeController();
});

// Make it available globally for debugging
window.DarkModeController = DarkModeController;