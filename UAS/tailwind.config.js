/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: "class",
  content: ["./pages/**/*.{html,js,php}",],
  theme: {
    extend: {
      colors: {
        orangeCustom: '#FF731D',
      },
    },
  },
  plugins: [],
}
