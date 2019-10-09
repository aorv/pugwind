const { colors } = require('tailwindcss/defaultTheme');

module.exports = {
  corePlugins: {
    fontFamily: false,
  },
  theme: {
    colors: {
      transparent: colors.transparent,
      white: colors.white,
      gray: colors.gray,
    },
    screens: {
      md: '1024px',
      lg: '1500px',
    },
    extend: {
      colors: {
        'primary': '#e8385a',
        'secondary': '#152034'
      }
    }
  },
  variants: {},
  plugins: []
}
