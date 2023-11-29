/** @type {import('tailwindcss').Config} */
module.exports = {
  mode: "jit",
  content: [
    './public/**/*.{php,js,html}',
    './app/View/**/*.{php,js,html}',
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

