// @ts-check
import { defineConfig } from 'astro/config';
import tailwindcss from "@tailwindcss/vite";

// https://astro.build/config
export default defineConfig({
    site: 'https://ricardobarantini.github.io',
    base: '/karinalima.adv.br',
    vite: {
        plugins: [tailwindcss()],
    },
});
