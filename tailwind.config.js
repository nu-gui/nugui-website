/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './app/Views/**/*.php',
    './public/**/*.html',
    './public/assets/**/*.js',
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          50: '#e1f5fe',
          100: '#b3e5fc',
          200: '#81d4fa',
          300: '#4fc3f7',
          400: '#29b6f6',
          500: '#00A2E8', // Bright Blue - Your signature color!
          600: '#0288d1',
          700: '#0277bd',
          800: '#01579b',
          900: '#0d47a1',
        },
        // Enhanced dark theme colors
        gray: {
          50: '#f9fafb',
          100: '#f3f4f6',
          200: '#e5e7eb',
          300: '#d1d5db',
          400: '#9ca3af',
          500: '#6b7280',
          600: '#4b5563',
          700: '#374151',
          800: '#1f2937',
          900: '#111827',
          950: '#030712',
        },
        // NUGUI Product Colors (Bright & Vibrant)
        gold: {
          50: '#fffbf0',
          100: '#fff4d1',
          200: '#ffe9a3',
          300: '#FFC847', // Light
          400: '#ffc107',
          500: '#FFB000', // Bright Gold (CCS)
          600: '#E69500', // Dark
          700: '#cc8400',
          800: '#b37300',
          900: '#996200',
        },
        purple: {
          50: '#f3e8ff',
          100: '#e9d5ff',
          200: '#d8b4fe',
          300: '#B86CE8', // Light
          400: '#a855f7',
          500: '#9C4DCC', // Bright Purple (Data)
          600: '#7B2D99', // Dark
          700: '#6b21a8',
          800: '#581c87',
          900: '#4c1d95',
        },
        green: {
          50: '#e8f5e8',
          100: '#c8e6c8',
          200: '#a5d6a7',
          300: '#69F0AE', // Light
          400: '#4caf50',
          500: '#00E676', // Vibrant Green (SIP/Voice)
          600: '#00C853', // Dark
          700: '#388e3c',
          800: '#2e7d32',
          900: '#1b5e20',
        },
        orange: {
          50: '#fff3e0',
          100: '#ffe0b2',
          200: '#ffcc82',
          300: '#FF8A65', // Light
          400: '#ff7043',
          500: '#FF5722', // Vibrant Orange (SMS)
          600: '#E64A19', // Dark
          700: '#d84315',
          800: '#bf360c',
          900: '#a52714',
        },
        // Brand colors for theme states
        brand: {
          'bg-light': '#FFFFFF',
          'bg-light-secondary': '#F7F9FB',
          'bg-dark': '#121212',
          'bg-dark-secondary': '#1E1E1E',
          'text-light': '#333333',
          'text-light-secondary': '#666666',
          'text-dark': '#FFFFFF',
          'text-dark-secondary': '#CCCCCC',
          'border-light': '#E0E0E0',
          'border-dark': '#333333',
        }
      },
      fontFamily: {
        'sans': ['Roboto', 'system-ui', 'sans-serif'],
      },
      animation: {
        'fade-in': 'fadeIn 0.5s ease-in',
        'slide-up': 'slideUp 0.3s ease-out',
        'scale-hover': 'scaleHover 0.2s ease-in-out',
        'bounce-gentle': 'bounceGentle 2s infinite',
        'pulse-soft': 'pulseSoft 2s cubic-bezier(0.4, 0, 0.6, 1) infinite',
      },
      keyframes: {
        fadeIn: {
          '0%': { opacity: '0' },
          '100%': { opacity: '1' },
        },
        slideUp: {
          '0%': { transform: 'translateY(10px)', opacity: '0' },
          '100%': { transform: 'translateY(0)', opacity: '1' },
        },
        scaleHover: {
          '0%': { transform: 'scale(1)' },
          '100%': { transform: 'scale(1.05)' },
        },
        bounceGentle: {
          '0%, 100%': { transform: 'translateY(-5%)' },
          '50%': { transform: 'translateY(0)' },
        },
        pulseSoft: {
          '0%, 100%': { opacity: '1' },
          '50%': { opacity: '0.8' },
        },
      },
      spacing: {
        '18': '4.5rem',
        '88': '22rem',
        '112': '28rem',
        '128': '32rem',
      },
      zIndex: {
        '60': '60',
        '70': '70',
        '80': '80',
        '90': '90',
        '100': '100',
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
    require('@tailwindcss/aspect-ratio'),
    require('@tailwindcss/container-queries'),
    require('daisyui'),
  ],
  darkMode: 'class',
  daisyui: {
    themes: [
      {
        nuguidark: {
          "primary": "#00A2E8", // Bright Blue - Your signature color!
          "primary-focus": "#0082BB", // Darker Blue
          "primary-content": "#ffffff",
          
          "secondary": "#33B5ED", // Lighter Blue
          "secondary-focus": "#00A2E8", // Main Blue
          "secondary-content": "#ffffff",
          
          "accent": "#FFB000", // Bright Gold (CCS)
          "accent-focus": "#FFC107", // Even Brighter Gold
          "accent-content": "#000000",
          
          "neutral": "#1E1E1E",
          "neutral-focus": "#121212",
          "neutral-content": "#CCCCCC",
          
          "base-100": "#121212", // Dark background
          "base-200": "#1E1E1E", // Secondary background
          "base-300": "#333333", // Tertiary/borders
          "base-content": "#FFFFFF", // Primary text
          
          "info": "#5AB4F1", // Cyan Highlight
          "success": "#348E4E", // Green SIP - Dark
          "warning": "#CF5B24", // Orange SMS - Dark
          "error": "#ef4444",
          
          "--rounded-box": "0.5rem",
          "--rounded-btn": "0.375rem",
          "--rounded-badge": "1.9rem",
          "--animation-btn": "0.25s",
          "--animation-input": "0.2s",
          "--btn-text-case": "none",
          "--btn-focus-scale": "0.95",
          "--border-btn": "1px",
          "--tab-border": "1px",
          "--tab-radius": "0.5rem",
        },
        nuguilight: {
          "primary": "#00A2E8", // Bright Blue - Your signature color!
          "primary-focus": "#0082BB", // Darker Blue
          "primary-content": "#ffffff",
          
          "secondary": "#33B5ED", // Lighter Blue
          "secondary-focus": "#00A2E8", // Main Blue
          "secondary-content": "#ffffff",
          
          "accent": "#FFC107", // Bright Gold
          "accent-focus": "#FFB000", // Bright Gold Focus
          "accent-content": "#000000",
          
          "neutral": "#F7F9FB",
          "neutral-focus": "#E0E0E0",
          "neutral-content": "#333333",
          
          "base-100": "#FFFFFF", // Light background
          "base-200": "#F7F9FB", // Secondary background
          "base-300": "#E0E0E0", // Tertiary/borders
          "base-content": "#333333", // Primary text
          
          "info": "#97C9F6", // Sky Blue
          "success": "#5FB673", // Green SIP - Light
          "warning": "#E87D4E", // Orange SMS - Light
          "error": "#ef4444",
          
          "--rounded-box": "0.5rem",
          "--rounded-btn": "0.375rem",
          "--rounded-badge": "1.9rem",
          "--animation-btn": "0.25s",
          "--animation-input": "0.2s",
          "--btn-text-case": "none",
          "--btn-focus-scale": "0.95",
          "--border-btn": "1px",
          "--tab-border": "1px",
          "--tab-radius": "0.5rem",
        },
      },
      "night",
      "black",
      "dark",
    ],
    darkTheme: "nuguidark",
    base: true,
    styled: true,
    utils: true,
    rtl: false,
    prefix: "",
    logs: true,
  },
}