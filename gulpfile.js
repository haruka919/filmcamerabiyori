// var gulp = require('gulp');
// var sass = require('gulp-sass');
// var sassGlob = require('gulp-sass-glob');
// var sourcemaps = require('gulp-sourcemaps');
// var postcss = require('gulp-postcss');
// var cssdeclsort = require('css-declaration-sorter');
// var browserify = require('browserify');

// gulp.task('sass', function () {
//     return gulp.src('./resources/sass/**/*.scss')
//         .pipe(sourcemaps.init())
//         .pipe(sassGlob())
//         .pipe(sass({ outputStyle: 'expanded' }))
//         .pipe(postcss([cssdeclsort({order: 'smacss'})]))
//         .pipe(sourcemaps.write())
//         .pipe(gulp.dest('./public/css'));
// });

// // gulp.task('browserify', function () {
// //     return browserify('./resources/js/app.js')
// //         .bundle()
// //         .pipe(source('bundle.js'))
// //         .pipe(gulp.dest('./public/js'));
// // });

// gulp.task('sass:watch', () => {
//     gulp.watch('./resources/sass/**/*.scss', gulp.series('sass'));
// });

