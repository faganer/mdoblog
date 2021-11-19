
const autoprefixer = require('autoprefixer')
const cssBase64 = require('gulp-css-base64')
const changed = require('gulp-changed')
const cssnano = require('cssnano')
const { createGulpEsbuild } = require('gulp-esbuild')
const gulpEsbuild = createGulpEsbuild({
  incremental: true, // enables the esbuild's incremental build
  piping: true // enables piping
})
const del = require('del')
const gulp = require('gulp')
const postcss = require('gulp-postcss')
const rename = require('gulp-rename')
const squoosh = require('gulp-libsquoosh')

const sass = require('gulp-sass')(require('sass'))
const header = require('gulp-header')
const pkg = require('./package.json')

const banner = [
  '/*!',
  ' * <%= pkg.name %> v<%= pkg.version %> (<%= pkg.homepage %>)',
  ' * Copyright <%= new Date().getFullYear() %> <%= pkg.author %>.',
  ' * Licensed under the <%= pkg.license %> license',
  ' */',
  ''
].join('\n')

const paths = {
  scss: {
    src: 'src/sass/**/*.scss',
    dest: 'dist/css/'
  },
  scripts: {
    src: 'src/js/**/*.js',
    dest: 'dist/js/'
  },
  images: {
    src: 'src/images/**/*.*',
    dest: 'dist/images/'
  }
}

/* Not all tasks need to use streams, a gulpfile is just another node program
 * and you can use all packages available on npm, but it must return either a
 * Promise, a Stream or take a callback and call it
 */
function clean () {
  // You can use multiple globbing patterns as you would with `gulp.src`,
  // for example if you are using del 2.0 or above, return its promise
  return del(['dist'])
}

/*
 * Define our tasks using plain functions
 */
function scss () {
  const plugins = [autoprefixer(), cssnano()]
  return (
    gulp
      .src(paths.scss.src)
      .pipe(changed(paths.scss.dest))
      .pipe(sass().on('error', sass.logError))
      .pipe(postcss(plugins))
      .pipe(cssBase64())
      .pipe(header(banner, { pkg }))
      .pipe(
        rename({
          suffix: '.min'
        })
      )
      .pipe(gulp.dest(paths.scss.dest))
  )
}

function scripts () {
  return gulp.src('src/js/main.js')
    .pipe(changed(paths.scripts.dest))
    .pipe(gulpEsbuild({
      outfile: 'bundled.min.js',
      bundle: true,
      minify: true
    }))
    .pipe(header(banner, { pkg }))
    .pipe(gulp.dest(paths.scripts.dest))
    .pipe(gulp.dest(paths.scripts.dest))
}

function images () {
  return gulp
    .src(paths.images.src)
    .pipe(changed(paths.images.dest))
    .pipe(squoosh())
    .pipe(gulp.dest(paths.images.dest))
}

function watch () {
  gulp.watch(paths.scss.src, scss)
  gulp.watch(paths.scripts.src, scripts)
  gulp.watch(paths.images.src, images)
}

/*
 * Specify if tasks run in series or parallel using `gulp.series` and `gulp.parallel`
 */
// var build = gulp.series(clean, gulp.parallel(scss, js, images, sprite, ajax, fonts, watch));
const build = gulp.series(
  gulp.parallel(scss, scripts, images, watch)
)

/*
 * You can use CommonJS `exports` module notation to declare tasks
 */
exports.clean = clean
exports.scss = scss
exports.scripts = scripts
exports.images = images
exports.watch = watch
exports.build = build

/*
 * Define default task that can be called by just running `gulp` from cli
 */
exports.default = build
