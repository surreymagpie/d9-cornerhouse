const { src, dest, series, watch } = require('gulp');
var sass = require('gulp-sass')(require('sass'));
var browserSync = require('browser-sync').create();
let source = {
  sass: 'sass/**/*.sass',
  css: 'css',
};

function styles() {
  return src(source.sass)
    .pipe(sass({ outputStyle: "expanded" }).on('error', sass.logError))
    .pipe(dest(source.css))
    .pipe(browserSync.stream());
};


function serve() {
  browserSync.init({
    proxy: "http://d9-cornerhouse.ddev.site/"
  });
  watch(source.sass, styles);
};

exports.default = series(styles, serve);
exports.serve = serve;
exports.watch = function () {
  watch(source.sass, styles);
};
