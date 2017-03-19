'use strict';

const gulp = require('gulp');
const sass = require('gulp-sass');
const prefix = require('gulp-autoprefixer');
const cleanCSS = require('gulp-clean-css');
const rename = require('gulp-rename');

gulp.task('sass', function() {
    gulp.src('./assets/scss/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(prefix("last 1 version", "> 1%", "ie 8"))
    .pipe(cleanCSS({
        compatibility: 'ie7',
        format: {
          breaks: {
            afterComment: true,
            afterProperty: true
          }
        }
      }))
    .pipe(rename({suffix: ".min"}))
    .pipe(gulp.dest('./assets/css'));
});

gulp.task('default', function() {
    gulp.watch('./assets/scss/**/*.scss', ['sass']);
});