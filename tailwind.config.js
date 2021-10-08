const colors = require('tailwindcss/colors')

module.exports = {
    purge: [
        './storage/framework/views/**/*.blade.php',
        './resources/**/*.blade.php',
        './resources/**/*.css',
        './resources/**/*.js',
    ],
  darkMode: 'class', // or 'media' or 'class'
  mode: 'jit',
  theme: {
    extend: {
        colors: {
            teal: colors.teal,
        }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [
        require('@tailwindcss/typography'),
        require('@tailwindcss/forms'),
        require('@tailwindcss/line-clamp'),
        require('@tailwindcss/aspect-ratio'),
  ],
}
