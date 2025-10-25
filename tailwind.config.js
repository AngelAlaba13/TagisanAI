/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'light': '#DEDEDE', // light text for dark mode
        'dark': '#1C1C1C',  // dark text for light mode

        // Background colors
        'bglight': '#FAF9F3',  // background for light mode
        'bgdark': '#333333',   // background for dark mode
      },
      fontFamily: {
        poppins: ['Poppins', 'sans-serif'],
      },
    },
  },
   plugins: [require('daisyui')],
      daisyui: {
        themes: ["light", "dark"],
        darkTheme: "dark",
    },
}
