import flowbite from 'flowbite/plugin.js';
import colors from 'tailwindcss/colors.js';

/** @type {import('tailwindcss').Config} config */
const config = {
  content: [
    './app/**/*.php',
    './resources/**/*.{php,vue,js}',
    './node_modules/flowbite/**/*.js'
  ],
  theme: {
    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      black: colors.black,
      white: colors.white,
      gray: colors.gray,
      blue: colors.blue
    }, 
  },
  plugins: [
    flowbite
  ],
};

export default config;
