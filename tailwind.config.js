module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        roboto: ["Roboto", "sans-serif"],
      },
      colors: {
        "gray-dark": "#010414",
        "gray-light": "#808189",
        "brand-blue": "#2029F3",
        "brand-green": "#0FBA68",
      },
    },
  },
  plugins: [],
};