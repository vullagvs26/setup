import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import path from 'path'

// https://vite.dev/config/
export default defineConfig({
  plugins: [vue()],
  resolve: {
    alias: {
      '@' : path.resolve(__dirname, './src')
    }
  },
  build: {
    sourcemap: true, 
    rollupOptions: {
      output: {
        entryFileNames: "asset/[name].js" , 
        chunkFileNames: "asset/[name].js",
        assetFileNames: "asset/[name].[ext]"
      }
    },
  },
  base: `http://localhost/setup/server/` , 
})
