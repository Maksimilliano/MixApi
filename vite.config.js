import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import fs from 'fs';

const parse = (envStr) => {
    const arrayPreparedData = envStr
        .split('\n')
        .filter(i => i.trim().length > 0);
    const valKeyData = arrayPreparedData
        .map(s => s.split('=').filter(i => i.trim().length > 0));
    let data = {};
    valKeyData.forEach(valKeyArr => {
        data[valKeyArr[0]] = valKeyArr[1];
    });

    return data;
}

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    // The Vue plugin will re-write asset URLs, when referenced
                    // in Single File Components, to point to the Laravel web
                    // server. Setting this to `null` allows the Laravel plugin
                    // to instead re-write asset URLs to point to the Vite
                    // server instead.
                    base: null,

                    // The Vue plugin will parse absolute URLs and treat them
                    // as absolute paths to files on disk. Setting this to
                    // `false` will leave absolute URLs un-touched so they can
                    // reference assets in the public directory as expected.
                    includeAbsolute: false,
                },
            },
        }),
    ],
    define: {
        'process.env': parse(fs.readFileSync('./.vue-env', 'utf-8'))
    }
});
