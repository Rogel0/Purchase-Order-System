import { defineConfig } from 'vite';

export default defineConfig({
  root: './src', // Set the root directory to the `src` folder
  build: {
    outDir: '../dist', // Output built files to the `dist` folder
  },
});