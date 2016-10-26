var gulp = require('gulp');
var sass = require('gulp-sass');
var bourbon = require('node-bourbon').includePaths;
var autoprefixer = require('gulp-autoprefixer');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var browserSync = require('browser-sync').create();

var paths = {
    scss: 'sass/**/*.scss'
};

gulp.task('default', ['sass'], function () {
});

gulp.task('sass-watch', ['sass'], function () {
    gulp.watch(paths.scss, ['sass']);
    browserSync.init({
        ghostMode: false,
        reloadOnRestart: true,
        open: false
    });
});

// Tutti i file .scss nella cartella sass vengono compressi, prefixati e copiati nella cartella css
gulp.task('sass', function () {
    gulp.src(paths.scss)
        .pipe(sass({
            includePaths: bourbon,
            outputStyle: 'compressed',
        }).on('error', sass.logError))
        .pipe(autoprefixer({
            browsers: ['last 10 versions']
        })).pipe(gulp.dest('web/bundles/app/css')).pipe(browserSync.stream());
});
