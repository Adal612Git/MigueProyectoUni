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
        'domogas-orange': '#ff6a00',
        'domogas-orange-light': '#ff944d',
        'domogas-dark': '#0f172a',
        'domogas-gray': '#f9fafb',
        'domogas-blue': '#0056d6',
        // Backwards compatibility / alternate palette used in some views
        'hgas-blue': '#0056d6',
        'hgas-dark': '#0f172a',
        'hgas-accent': '#ff6a00',
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
