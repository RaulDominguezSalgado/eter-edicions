/** @type {import('tailwindcss').Config} */
export default {
    // mode: 'jit',
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
        },
        colors: {
            dark: '#000000',
            light: '#ffffff',
            primary: '#6EB37C',
            secondary: '#E6CE76',

            primarydark: '#5EA36C',

            darkgrey: '#484848',
            lightgrey: '#D9D9D9',
            verylightgrey: '#F2F1F1',

            textmuted: '#9EA2AF',

            surfacelight: '#F8FAFC',
            surfacemedium: '#f3f3f3',
            surfacedark: '#E2E7ED',

            systemerror: '#ED4337',
            systemsuccess: '#0E6245',

        }
    },
  },
  plugins: [
    require('@tailwindcss/forms')
  ],
}

