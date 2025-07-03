/**
 * Apple-Style Global Navigation JavaScript
 * Handles mobile menu, scroll effects, and interactions
 */

class GlobalNav {
  constructor() {
    this.globalnav = document.getElementById('globalnav');
    this.menuButton = document.getElementById('globalnav-menubutton');
    this.menu = document.getElementById('globalnav-menu');
    this.isMenuOpen = false;
    this.lastScrollY = window.scrollY;
    this.scrollDirection = 'up';
    
    this.init();
  }

  init() {
    this.setupMenuToggle();
    this.setupScrollEffects();
    this.setupActiveLinks();
    this.setupKeyboardNavigation();
  }

  setupMenuToggle() {
    if (!this.menuButton || !this.menu) return;

    this.menuButton.addEventListener('click', (e) => {
      e.preventDefault();
      this.toggleMenu();
    });

    // Close menu when clicking outside
    document.addEventListener('click', (e) => {
      if (this.isMenuOpen && !this.globalnav.contains(e.target)) {
        this.closeMenu();
      }
    });

    // Close menu when pressing Escape
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && this.isMenuOpen) {
        this.closeMenu();
      }
    });

    // Close menu when clicking on menu links
    const menuLinks = this.menu.querySelectorAll('.globalnav-menu-link');
    menuLinks.forEach(link => {
      link.addEventListener('click', () => {
        this.closeMenu();
      });
    });
  }

  toggleMenu() {
    if (this.isMenuOpen) {
      this.closeMenu();
    } else {
      this.openMenu();
    }
  }

  openMenu() {
    this.isMenuOpen = true;
    this.menu.classList.add('open');
    this.globalnav.classList.add('globalnav-menu-open');
    this.menuButton.setAttribute('aria-expanded', 'true');
    
    // Prevent body scroll
    document.body.style.overflow = 'hidden';
    
    // Focus management
    const firstLink = this.menu.querySelector('.globalnav-menu-link');
    if (firstLink) {
      setTimeout(() => firstLink.focus(), 100);
    }
  }

  closeMenu() {
    this.isMenuOpen = false;
    this.menu.classList.remove('open');
    this.globalnav.classList.remove('globalnav-menu-open');
    this.menuButton.setAttribute('aria-expanded', 'false');
    
    // Restore body scroll
    document.body.style.overflow = '';
    
    // Return focus to menu button
    this.menuButton.focus();
  }

  setupScrollEffects() {
    let ticking = false;

    const updateNavOnScroll = () => {
      const currentScrollY = window.scrollY;
      const scrollDelta = Math.abs(currentScrollY - this.lastScrollY);
      
      // Only update if scroll delta is significant
      if (scrollDelta < 5) return;

      this.scrollDirection = currentScrollY > this.lastScrollY ? 'down' : 'up';

      // Add scrolled class when scrolled past 50px
      if (currentScrollY > 50) {
        this.globalnav.classList.add('scrolled');
      } else {
        this.globalnav.classList.remove('scrolled');
      }

      // Auto-hide navigation on scroll down (except when menu is open)
      if (!this.isMenuOpen) {
        // Always show nav when near the top
        if (currentScrollY <= 150) {
          this.globalnav.classList.remove('globalnav-hidden');
        } 
        // Hide when scrolling down past 300px
        else if (this.scrollDirection === 'down' && currentScrollY > 300) {
          this.globalnav.classList.add('globalnav-hidden');
        } 
        // Show when scrolling up (and not near top)
        else if (this.scrollDirection === 'up' && currentScrollY > 150) {
          this.globalnav.classList.remove('globalnav-hidden');
        }
      }

      this.lastScrollY = currentScrollY;
      ticking = false;
    };

    window.addEventListener('scroll', () => {
      if (!ticking) {
        requestAnimationFrame(updateNavOnScroll);
        ticking = true;
      }
    });
  }

  setupActiveLinks() {
    const currentPath = window.location.pathname;
    const navLinks = document.querySelectorAll('.globalnav-link');
    
    navLinks.forEach(link => {
      const href = link.getAttribute('href');
      if (href && (href === currentPath || (href !== '/' && currentPath.includes(href)))) {
        link.classList.add('active');
      }
    });

    // Update active links on navigation
    navLinks.forEach(link => {
      link.addEventListener('click', (e) => {
        // Remove active class from all links
        navLinks.forEach(l => l.classList.remove('active'));
        // Add active class to clicked link
        link.classList.add('active');
      });
    });
  }

  setupKeyboardNavigation() {
    const navLinks = document.querySelectorAll('.globalnav-link');
    
    navLinks.forEach((link, index) => {
      link.addEventListener('keydown', (e) => {
        switch (e.key) {
          case 'ArrowRight':
            e.preventDefault();
            const nextLink = navLinks[index + 1] || navLinks[0];
            nextLink.focus();
            break;
          case 'ArrowLeft':
            e.preventDefault();
            const prevLink = navLinks[index - 1] || navLinks[navLinks.length - 1];
            prevLink.focus();
            break;
          case 'Home':
            e.preventDefault();
            navLinks[0].focus();
            break;
          case 'End':
            e.preventDefault();
            navLinks[navLinks.length - 1].focus();
            break;
        }
      });
    });

    // Mobile menu keyboard navigation
    if (this.menu) {
      const menuLinks = this.menu.querySelectorAll('.globalnav-menu-link');
      
      menuLinks.forEach((link, index) => {
        link.addEventListener('keydown', (e) => {
          switch (e.key) {
            case 'ArrowDown':
              e.preventDefault();
              const nextMenuLink = menuLinks[index + 1] || menuLinks[0];
              nextMenuLink.focus();
              break;
            case 'ArrowUp':
              e.preventDefault();
              const prevMenuLink = menuLinks[index - 1] || menuLinks[menuLinks.length - 1];
              prevMenuLink.focus();
              break;
            case 'Home':
              e.preventDefault();
              menuLinks[0].focus();
              break;
            case 'End':
              e.preventDefault();
              menuLinks[menuLinks.length - 1].focus();
              break;
          }
        });
      });
    }
  }

  // Public methods
  hideNav() {
    this.globalnav.classList.add('globalnav-hidden');
  }

  showNav() {
    this.globalnav.classList.remove('globalnav-hidden');
  }

  isNavHidden() {
    return this.globalnav.classList.contains('globalnav-hidden');
  }
}

// Initialize global navigation
document.addEventListener('DOMContentLoaded', () => {
  window.globalNav = new GlobalNav();
});

// Handle page visibility changes
document.addEventListener('visibilitychange', () => {
  if (document.hidden && window.globalNav && window.globalNav.isMenuOpen) {
    window.globalNav.closeMenu();
  }
});

// Handle resize events
let resizeTimeout;
window.addEventListener('resize', () => {
  clearTimeout(resizeTimeout);
  resizeTimeout = setTimeout(() => {
    if (window.globalNav && window.globalNav.isMenuOpen && window.innerWidth > 768) {
      window.globalNav.closeMenu();
    }
  }, 150);
});

// Export for potential module usage
if (typeof module !== 'undefined' && module.exports) {
  module.exports = GlobalNav;
}
