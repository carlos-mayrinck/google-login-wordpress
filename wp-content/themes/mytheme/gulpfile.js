const { src, dest, parallel, series, watch } = require('gulp'),
  browserSync = require('browser-sync').create(),
  gulpSass = require('gulp-sass')(require('node-sass')),
  purgecss = require('gulp-purgecss'),
  concat = require('gulp-concat');

// Sass compiler
const sass = () => {
  return src('./assets/src/sass/**/*.scss')
    .pipe( gulpSass({ outputStyle: "compressed" }).on( 'error', gulpSass.logError ))
    .pipe( dest('./assets/dist/css') );
}

// Local server connection
const server = () => {
  browserSync.init({
    proxy: "http://localhost/wordpress-theme"
  });

  watch('./**/*.php').on( 'change', browserSync.reload );
  watch('./assets/src/sass/**/*.scss').on( 'change', series(sass, browserSync.reload) );
}

exports.default = server;