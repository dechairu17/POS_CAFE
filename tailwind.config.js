/** @type {import('tailwindcss').Config} */
export default {
  // Beri tahu Tailwind file mana yang harus dipindai
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        'bg-container': '#F4EDE4',       // Sesuai Figma (Sudah benar)
        'button-brown': '#BDA593',     // Sesuai Figma (Sudah benar)
        'button-hover': '#a79483',     // (Sudah benar)
        'text-primary': '#351F15',     // Warna teks dari Figma Anda
        'icon-gray': '#8A8A8A',        // (Sudah benar, tapi kita akan gunakan text-gray-500)
        'border-input': '#E0D8CC',     // (Sudah benar)
      },
      fontFamily: {
        // Ganti Poppins menjadi Inter agar sesuai Figma
        sans: ['Inter', 'sans-serif'], 
      }
    },
  },
  plugins: [],
}