const colors = require("tailwindcss/colors");
module.exports = {
  content: [
    "./index.html",
    "./src/**/*.{vue,js,ts,jsx,tsx}",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        primary: "#3DCCC7",
        secondary: "#F8F5F5",
      },
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}
