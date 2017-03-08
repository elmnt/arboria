'use strict';

// ----------- Dependencies

/*
Tuesday, March 7, 2017:
Added babel plugin to compile ES6 code without throwing errors
Specifically for the added script image-crop.js
*/

var gulp        = require('gulp'),
    browserSync = require('browser-sync').create(),
    concat      = require('gulp-concat'),
    uglify      = require('gulp-uglify'),
    rename      = require('gulp-rename'),
    sass        = require('gulp-sass'),
    postcss     = require('gulp-postcss'),
    tachyons    = require('tachyons-build-css'),
    cleancss    = require('gulp-clean-css'),
    maps        = require('gulp-sourcemaps'),
    cache       = require('gulp-cache'),
    del         = require('del'),
    runSequence = require('run-sequence'),
    babel       = require('gulp-babel');

// ----------- Variables

var aj = 'assets/js/',
    ac = 'assets/css/',
    ai = 'assets/images/',
    sj = 'src/js/',
    // Stringer
    ss = 'src/stringer/**/*.scss',
    // Kirby building blocks:
    site_s = 'site/snippets/*.php',
    site_t = 'site/templates/*.php',
    // Kirby content:
    kc = 'content/**/*.txt';

// ----------- Static Server & Watch Files

/*
THIS WILL BE OUR DEFAULT TASK.
To develop Kirby locally:
1. gulp build
2. gulp
*/

gulp.task('serve', ['compileSass'], function() {

    // Note: I'm using MAMP PRO for my local server
    browserSync.init({
        proxy: 'arboria.dev:8888',
        notify: false
    });

    // Watch styles, scripts, snippets/templates, kirby content text files
    gulp.watch(ss, ['compileSass']);
    gulp.watch(sj + '*', ['minifyScripts']);
    gulp.watch(sj + 'wheretobuy.js', ['minifyWTBScripts']);
    gulp.watch(site_s).on('change', browserSync.reload);
    gulp.watch(site_t).on('change', browserSync.reload);
    gulp.watch(kc).on('change', browserSync.reload);

});

// ----------- Concat & Minify JS

// Concat all (active) project scripts to src/js/app.js
// I've added a few here, use them, delete them, add your own, etc.
gulp.task('concatScripts', function() {
  return gulp.src([
    sj + 'jquery-2.1.4.min.js',
    sj + 'elmenu.js',
    //sj + 'flickity.min.js',
    sj + 'responsiveslides.js',
    sj + 'picturefill.min.js',
    //sj + 'picturefill-background.js',
    sj + 'jquery.easing.1.3.js',
    'src/featherlight/featherlight.js',
    sj + 'main.js',
    sj + 'image-crop.js'
  ])
  .pipe(concat('app.js'))
  .pipe(gulp.dest(sj));
});

// Now minify it, and put it in assets/js/
gulp.task('minifyScripts', ['concatScripts'], function() {
  return gulp.src(sj + 'app.js')
    .pipe(maps.init())
    .pipe(babel({
      presets: ['es2015']
    }))
    //.pipe(uglify())
    .pipe(uglify().on('error', function(e){
      console.log(e);
    }))
    .pipe(rename('app.min.js'))
    .pipe(maps.write('./'))
    .pipe(gulp.dest(aj));
});

// Where to Buy Page Scripts

// Concat the Where to Buy scripts separately,
// So we can include them only for the WTB page
gulp.task('concatWTBScripts', function() {
  return gulp.src([
    sj + 'wheretobuy.js'
  ])
  .pipe(concat('wtb.js'))
  .pipe(gulp.dest(sj));
});

gulp.task('minifyWTBScripts', ['concatWTBScripts'], function() {
  return gulp.src(sj + 'wtb.js')
    .pipe(uglify())
    .pipe(rename('wtb.min.js'))
    .pipe(gulp.dest(aj));
});

// /Where to Buy Scripts

// ----------- Compile Sass directly into assets/css/

gulp.task('compileSass', function () {
  return gulp.src('src/stringer/styles.scss')
    .pipe(maps.init())
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(rename('styles.min.css'))
    .pipe(maps.write('./'))
    .pipe(gulp.dest(ac))
    .pipe(browserSync.stream());
});

// ----------- Cleanup

gulp.task('clean', function(callback) {
  del(ac + '*.css*');
  del(aj + 'app.min.js');
  del(aj + 'app.min.js.map');
  del(aj + 'wtb.min.js');
  del(sj + 'app.js');
  del(sj + 'wtb.js');
  return cache.clearAll(callback);
})

// ----------- Build

// If you're using a Sass framework, such as Grom (included)
gulp.task('build', function(callback) {
  runSequence('clean', 'compileSass', 'minifyScripts', 'minifyWTBScripts', callback);
});

// ----------- DEFAULT

gulp.task('default', ['serve']);
