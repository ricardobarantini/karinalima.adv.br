/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        midnight: {
          100: '#707683',
          200: '#5a626f',
          300: '#454e5d',
          400: '#323a4b',
          500: '#1f2839',
          600: '#192130',
          700: '#141b28',
          800: '#0f151f',
          900: '#0a0f17'
        },
        cookie: {
          100: '#d3c3ab',
          200: '#ccba9d',
          300: '#c4b08f',
          400: '#bda782',
          500: '#b69d74',
          600: '#9e8864',
          700: '#867354',
          800: '#6f5f45',
          900: '#594c37'
        },
      },
    },
  },
  plugins: [],
}

