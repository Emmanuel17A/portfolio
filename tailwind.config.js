/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                // Core palette from Color Hunt #A59D84 #C1BAA1 #D7D3BF #ECEBDE
                sand: {
                    50:  '#FAFAF7',
                    100: '#ECEBDE',
                    200: '#D7D3BF',
                    300: '#C1BAA1',
                    400: '#A59D84',
                    500: '#8E8670',
                    600: '#74705C',
                    700: '#5A5848',
                    800: '#3E3D33',
                    900: '#252420',
                    950: '#141310',
                },
                // Deep complement for backgrounds
                obsidian: {
                    DEFAULT: '#17161A',
                    light: '#1E1D22',
                    mid: '#28272E',
                    border: '#333240',
                },
            },
            fontFamily: {
                display: ['"Cormorant Garamond"', 'Georgia', 'serif'],
                body: ['"Inter"', 'system-ui', 'sans-serif'],
                mono: ['"JetBrains Mono"', '"Fira Code"', 'monospace'],
            },
            fontSize: {
                'display-xl': ['clamp(3rem, 8vw, 7rem)', { lineHeight: '0.95', letterSpacing: '-0.03em' }],
                'display-lg': ['clamp(2.2rem, 5vw, 4.5rem)', { lineHeight: '1', letterSpacing: '-0.02em' }],
                'display-md': ['clamp(1.6rem, 3vw, 2.8rem)', { lineHeight: '1.1', letterSpacing: '-0.015em' }],
            },
            animation: {
                'fade-up': 'fadeUp 0.7s ease forwards',
                'ticker': 'ticker 30s linear infinite',
                'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
            },
            keyframes: {
                fadeUp: {
                    '0%': { opacity: '0', transform: 'translateY(24px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                ticker: {
                    '0%': { transform: 'translateX(0)' },
                    '100%': { transform: 'translateX(-50%)' },
                },
            },
            backgroundImage: {
                'grain': "url(\"data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E\")",
            },
            boxShadow: {
                'glass': '0 4px 24px rgba(0,0,0,0.3), inset 0 1px 0 rgba(165,157,132,0.1)',
                'card': '0 2px 8px rgba(0,0,0,0.4), 0 0 0 1px rgba(165,157,132,0.08)',
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
