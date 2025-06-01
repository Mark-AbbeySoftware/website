import {defineConfig} from 'vite';
import {viteStaticCopy} from 'vite-plugin-static-copy';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/bootstrap.css',
                'resources/css/landing-page.css',
                'resources/css/pe-icon-7-stroke.css',
                'resources/js/app.js',
                // add more as needed
            ],
            refresh: true,
        }),
        tailwindcss(),
        viteStaticCopy({
            targets: [
                {
                    src: 'resources/fonts/**/*', // Source folder or glob
                    dest: 'fonts'                      // Destination inside the output dir
                },
                {
                    src: 'resources/img/**/*', // Source folder or glob
                    dest: 'img'                      // Destination inside the output dir
                },
            ]
        })
    ],
});
