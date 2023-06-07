import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import {viteStaticCopy} from 'vite-plugin-static-copy'
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
        viteStaticCopy({
            targets: [
                {
                    src: 'resources/lib',
                    dest: ''
                },
            ]
        }),
    ],
    resolve: {
        alias: {
            '@': '/resources/js',
            'vue':'vue/dist/vue.esm-bundler',
        }
    },
});
