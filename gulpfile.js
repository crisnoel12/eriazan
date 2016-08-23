'use strict';

var gulp = require('gulp'),
  concat = require('gulp-concat'),
  uglify = require('gulp-uglify'),
  rename = require('gulp-rename'),
    sass = require('gulp-sass'),
    maps = require('gulp-sourcemaps'),
     del = require('del'),
  minify = require('gulp-clean-css');

  gulp.task("concatScripts", function(){
      return gulp.src(['js/app.js'])
      .pipe(maps.init())
      .pipe(concat("app.js"))
      .pipe(maps.write("./"))
      .pipe(gulp.dest("js"));
  });

  gulp.task("minifyScripts", function(){
      return gulp.src("js/app.js")
      .pipe(uglify())
      .pipe(rename('app.min.js'))
      .pipe(gulp.dest("js"));
  });

  gulp.task("compileSass", function(){
     return gulp.src("sass/app.scss")
     .pipe(maps.init())
     .pipe(sass())
     .pipe(maps.write("./"))
     .pipe(gulp.dest("css"));
  });

  gulp.task("minifyCss", ["compileSass"], function(){
      return gulp.src("css/app.css")
      .pipe(minify())
      .pipe(rename('app.min.css'))
      .pipe(gulp.dest("css"));
  });

  gulp.task('watch', function(){
      gulp.watch("sass/*.scss", ['minifyCss']);
      gulp.watch("js/app.js", ['minifyScripts']);
  });
