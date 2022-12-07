/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./resources/views/admin-page/product-management.blade.php",
  './vendor/wireui/wireui/resources/**/*.blade.php',

  './vendor/wireui/wireui/ts/**/*.ts',

  './vendor/wireui/wireui/src/View/**/*.php'],
  presets: [

   

    require('./vendor/wireui/wireui/tailwind.config.js')

],

  theme: {
    extend: {},
  },
  plugins: [require('@tailwindcss/forms'),
  require('@tailwindcss/aspect-ratio'),
  require("@tailwindcss/forms")({
    strategy: 'class',
  })
  
  ],
}
