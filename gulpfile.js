var gulp = require('gulp');
var del = require('del');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var cleanCSS = require('gulp-clean-css');
var image = require('gulp-image');

var config = {
    img: [
        './public/assets/raw-images/**/*.png',
        './public/assets/raw-images/**/*.jpg',
        './public/assets/raw-images/**/*.gif',
        './public/assets/raw-images/**/*.jpeg'
    ],
    js: [
        './public/bower_components/jquery/dist/jquery.js',
        './public/bower_components/owl.carousel/dist/owl.carousel.js',
        './public/assets/js/**/*.js'
    ],
    css: [
        './public/bower_components/font-awesome/css/font-awesome.css',
        './public/bower_components/owl.carousel/dist/assets/owl.carousel.css',
        './public/bower_components/owl.carousel/dist/assets/owl.theme.default.css',
        './public/assets/css/**/*.css'
    ],
    clean: [
        './public/dist/*',
        './public/fonts/*',
        './public/img/*'
    ]
};

gulp.task('clean', function () {
    del(config.clean);
});

gulp.task('compile:js', function () {
    return gulp.src(config.js)
        .pipe(concat('app.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./public/dist/'));
});

gulp.task('compile:css', function () {
    return gulp.src(config.css)
        .pipe(concat('app.min.css'))
        .pipe(cleanCSS())
        .pipe(gulp.dest('./public/dist/'));
});

gulp.task('compile:icons', function () {
    return gulp.src([
        './public/bower_components/font-awesome/fonts/**.*',
        './public/assets/raw-fonts/**.*'
    ]).pipe(gulp.dest('./public/fonts'));
});

gulp.task('compile:images', function () {
    gulp.src(config.img)
        .pipe(image())
        .pipe(gulp.dest('./public/img'));
});

gulp.task('watch', ['compile:js', 'compile:css', 'compile:images'], function () {
    gulp.watch(config.js , ['compile:js']);
    gulp.watch(config.css , ['compile:css']);
    gulp.watch(config.img , ['compile:images']);
});

gulp.task('default', [
    'clean',
    'compile:js',
    'compile:css',
    'compile:icons',
    'compile:images',
    'watch'
]);