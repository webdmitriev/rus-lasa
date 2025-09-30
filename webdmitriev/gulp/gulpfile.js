const theme = 'rus-lasa'; // name theme wordpress

const { src, dest, parallel, series, watch } = require('gulp');
const browserSync = require('browser-sync').create();
const concat = require('gulp-concat');
const uglify = require('gulp-uglify-es').default;
const sass = require('gulp-sass')(require('sass'));
const less = require('gulp-less');
const autoprefixer = require('gulp-autoprefixer');
const cleancss = require('gulp-clean-css');
const imagemin = require('gulp-imagemin');
const del = require('del');
const webp = require('gulp-webp');
const fs = require('fs');

const cb = () => { }

function browsersync() {
  browserSync.init({
    // server: {baseDir: './'},
    port: 8888,
    proxy: 'http://localhost:8888/' + theme + '/',
    notify: false, // удалили уведомления
    online: true, // можно работать без интернета
    // tunnel: true,
  });
}

function scripts() {
  return src([
    'node_modules/inputmask/dist/jquery.inputmask.js',
    'app/slick/slick.js',
    'app/js/app.js',
    'app/js/slider.js',
  ])
    .pipe(concat('app.min.js'))
    .pipe(uglify())
    .pipe(dest('../assets/js/'))
    .pipe(browserSync.stream())
}

function styles() {
  return src([
    'app/scss/app.scss',
  ])
    .pipe(sass())
    .pipe(concat('app.min.css'))
    .pipe(autoprefixer({ overrideBrowserslist: ['last 10 versions'], grid: true }))
    .pipe(cleancss(({ level: { 1: { specialComments: 0 } } })))
    .pipe(dest('../assets/css/'))
    .pipe(browserSync.stream())
}

function images() {
  return src('app/img/**/*')
    .pipe(imagemin([
      imagemin.gifsicle({ interlaced: true }),
      imagemin.mozjpeg({ quality: 75, progressive: true }),
      imagemin.optipng({ optimizationLevel: 5 }),
    ]))
    .pipe(dest('../assets/img'))
}

function webpjpg() {
  return src('app/img/**/*')
    .pipe(webp())
    .pipe(dest('../assets/img'))
}

function cleanimg() {
  return del('../assets/img/*', { force: true }) // Удаляем все содержимое папки "assets/img/"
}

function cleandist() {
  return del('dist/**/*', { force: true }) // Удаляем все содержимое папки "dist/"
}

function startwatch() {
  watch('app/scss/**/*', styles);
  watch(['app/**/*.js', '!app/**/*.min.js'], scripts);
  watch(['../**/*.scss', '../**/*.js']).on('change', browserSync.reload);
  watch(['../*.html', '../**/*.php']).on('change', browserSync.reload);
}

exports.browsersync = browsersync;
exports.scripts = scripts;
exports.styles = styles;

exports.images = images;
exports.webpjpg = webpjpg;

exports.cleanimg = cleanimg;
exports.cleandist = cleandist;

exports.default = parallel(styles, scripts, browsersync, startwatch);