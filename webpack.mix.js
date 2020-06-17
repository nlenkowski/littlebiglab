/* eslint-disable no-undef */
const mix = require("laravel-mix");
require("@ayctor/laravel-mix-svg-sprite");

mix
  .setPublicPath(path.resolve("./"))
  .js("./assets/scripts/home.js", "./dist/scripts")
  .js("./assets/scripts/page.js", "./dist/scripts")
  .js("./assets/scripts/project.js", "./dist/scripts")
  .sass("./assets/styles/main.scss", "./dist/styles")
  .copyDirectory("./assets/fonts", "./dist/fonts")
  .copyDirectory("./assets/images", "./dist/images")
  .svgSprite("assets/icons/*.svg", {
    output: {
      filename: "dist/icons/symbols.svg"
    },
    sprite: {
      prefix: "icon-"
    }
  })
  .options({
    processCssUrls: false,
    terser: {
      extractComments: false
    }
  })
  .extract();

// Enable Browsersync and source maps for development builds only
if (!mix.inProduction()) {
  mix.sourceMaps();
  mix.browserSync({
    proxy: "https://littlebiglab.test",
    open: false,
    notify: false,
    files: ["dist/styles/**/*.css", "dist/scripts/**/*.js", "**/*.php"],
    snippetOptions: {
      ignorePaths: ["admin/**"]
    }
  });
}
