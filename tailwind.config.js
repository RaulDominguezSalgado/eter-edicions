/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
      ],
  theme: {
    extend: {
        aspectRatio: {
            '2/3': '2 / 3',
            '3/5': '3 / 5',
            '7/5': '7 / 5'
        }
    },
  },
  plugins: [
    require('@tailwindcss/forms')
  ],
}

