/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        'bg-container': '#F4EDE4',
        'button-brown': '#BDA593',
        'button-hover': '#a79483',
        'text-primary': '#351F15', // Warna teks dari Figma (#351F15)
      },
      fontFamily: {
        sans: ['Inter', 'sans-serif'], // Font dari Figma
      },
      fontSize: {
        // Menambahkan ukuran font 75px dari Figma
        // Gunakan di HTML sebagai: class="text-figma-title"
        'figma-title': ['75px', {
          lineHeight: '1.1',
          fontWeight: '700',
        }],
      },
      borderRadius: {
        // Menambahkan corner radius 20px dari Figma
        // Gunakan di HTML sebagai: class="rounded-figma-container"
        'figma-container': '20px',
        'figma-input': '0.75rem', // 12px atau 'rounded-xl'
      }
    },
  },
  plugins: [],
}