const { src, dest, series, watch } = require('gulp');
var sass = require('gulp-sass')(require('sass'));
let source = {
  sass: 'sass/**/*.sass',
  css: 'css',
};

function styles() {
  return src(source.sass)
    .pipe(sass({ outputStyle: "expanded" }).on('error', sass.logError))
    .pipe(dest(source.css));
};

exports.default = styles;
exports.watch = function () {
  watch(source.sass, styles);
};
