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
    extend: {
      colors: {
        primary: {
          light: colors.blue[300],
          DEFAULT: colors.blue[700],
          dark: colors.blue[900],
        },
        black: colors.black,
        white: colors.white,
        gray: colors.gray,
        green: colors.green,
        red: colors.red,
        transparent: 'transparent',
        current: 'currentColor',
      }, 
    }, 
  },
  plugins: [
    flowbite
  ],
};

export default config;
