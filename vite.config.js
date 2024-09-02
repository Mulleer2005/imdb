import { defineConfig } from 'vite'
import { resolve } from 'path'

export default defineConfig({
  build: {
    rollupOptions: {
      input: {
        'detail': resolve(__dirname, 'JavaScript/detail.js'),
        'store-directors': resolve(__dirname, 'JavaScript/formulari-crear-directors.js'),
        'store-tags': resolve(__dirname, 'JavaScript/formulari-crear-tags.js'),
        'store-movies': resolve(__dirname, 'JavaScript/formulari-crear.js'),
        'unstore-movies': resolve(__dirname, 'JavaScript/formulari-eliminar.js'),
        'modify-movies': resolve(__dirname, 'JavaScript/formulari-modificar.js'),
      },
      output: {
        entryFileNames: ({ name }) => {
          return '[name].js'
        },
      },
    },
  },
})