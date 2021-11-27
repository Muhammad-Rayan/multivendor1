const mix = require('laravel-mix');
const path = require('path');


mix
.ts("resources/ts/app.ts", "public/js")
.styles([
  "public/frontend_styling/demo1.min.css",
  "public/frontend_styling/darkdemo.min.css",
  "public/frontend_styling/doc.min.css",
  "public/frontend_styling/style.min.css",
  "public/frontend_styling/style-rtl.min.css"
], "public/frontend_styling/all.css")
.vue({ version: 3 })
.webpackConfig({
    resolve: {
      alias: {
        '@': path.resolve(__dirname, 'resources/ts/src/')
      }
    }
  });