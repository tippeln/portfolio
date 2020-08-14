'use strict';

const gulp        = require('gulp');
const browserSync = require('browser-sync').create();
const sass        = require('gulp-sass');
const del         = require('del');
const plumber     = require('gulp-plumber');

gulp.task('delSass',function() {
  del(['html/css/*.css']);
});

gulp.task('sass',function() {
  return gulp.src(['assets/scss/*.scss'])
  .pipe(plumber())
  .pipe(sass({outputStyle: 'compressed'}))
  .pipe(gulp.dest('html/css/'))
  .pipe(browserSync.stream());
});

gulp.task('default',['delSass','sass'], function() {
  browserSync.init({
    server: {
      baseDir: 'html'
    }
  });
  gulp.watch(['assets/scss/*.scss'],['delSass','sass']);
})
