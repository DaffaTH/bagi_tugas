const gulp = require('gulp');
const babel = require('gulp-babel');
const uglify = require('gulp-uglify');
const sass = require('gulp-sass');
const concat = require('gulp-concat');
const sourcemaps = require('gulp-sourcemaps');

// Compile Sass
function css_main() {
  return gulp
    .src('src/css/main.scss')
    .pipe(sass({ outputStyle: 'compressed', }).on('error', sass.logError))
    .pipe(gulp.dest('assets/css'));
}

// Concat & Minify JS
function js_main() {
  return gulp
    .src([
      'lib/atlantis-lite/js/atlantis.mod.js',
      'lib/atlantis-lite/js/plugin/bootstrap-notify/bootstrap-notify.min.js',
      'lib/jQuery.Gantt.js',
      'src/js/main/main.js',
      'src/js/main/surat.js',
      'src/js/main/pegawai.js',
      'src/js/main/kwitansi.js',
      'src/js/main/firebase.js',
    ])
    .pipe(sourcemaps.init())
    .pipe(concat('main.js'))
    .pipe(babel({ presets: ['@babel/env'] }).on('error', function (e) { console.log(e) }))
    .pipe(uglify())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('assets/js'));
}
function js_static_page() {
  return gulp
    .src([
      'src/js/static-page/static-page.js',
    ])
    .pipe(concat('static-page.js'))
    .pipe(babel({ presets: ['@babel/env'] }).on('error', function (e) { console.log(e) }))
    .pipe(uglify())
    .pipe(gulp.dest('assets/js'));
}
function js_login_page() {
  return gulp
    .src([
      'src/js/login-page.js',
    ])
    .pipe(babel({ presets: ['@babel/env'] }).on('error', function (e) { console.log(e) }))
    .pipe(uglify())
    .pipe(gulp.dest('assets/js'));
}

// Watch files
function watchFiles() {
  gulp.watch('src/js/main/*.js', gulp.series(js_main));
  gulp.watch('src/js/static-page/*.js', gulp.series(js_static_page));
  gulp.watch('src/js/login-page.js', gulp.series(js_login_page));
  gulp.watch('lib/*.js', gulp.series(js_main, js_static_page));
  gulp.watch('src/css/**/*.scss', gulp.series(css_main));
}

// Export
exports.css_main = css_main;
exports.js_main = js_main;
exports.js_static_page = js_static_page;
exports.js_login_page = js_login_page;
exports.watch = watchFiles;
exports.default = gulp.series(css_main, js_main, js_static_page, js_login_page);
