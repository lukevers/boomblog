/*
|--------------------------------------------------------------------------
| Dependencies
|--------------------------------------------------------------------------
*/

var gulp   = require('gulp');
var less   = require('gulp-less');
var concat = require('gulp-concat');
var minify = require('gulp-minify-css');
var uglify = require('gulp-uglify');

/*
|--------------------------------------------------------------------------
| Less
|--------------------------------------------------------------------------
*/

gulp.task('less', function() {
    return gulp.src('resources/assets/less/main.less')
        .pipe(less())
        .pipe(concat('styles.css'))
        .pipe(minify())
        .pipe(gulp.dest('public/assets/css/'));
});

/*
|--------------------------------------------------------------------------
| JavaScript
|--------------------------------------------------------------------------
*/

gulp.task('js', function() {
    return gulp.src([
            'bower_components/jquery/dist/jquery.min.js',
            'bower_components/bootstrap/dist/js/bootstrap.min.js',
            'bower_components/summernote/dist/summernote.min.js',
            'resources/assets/js/main.js',
        ])
        .pipe(concat('scripts.js'))
        .pipe(uglify())
        .pipe(gulp.dest('public/assets/js/'));
});

/*
|--------------------------------------------------------------------------
| Copy Task
|--------------------------------------------------------------------------
*/

gulp.task('copy', function() {
    return gulp.src('bower_components/font-awesome/fonts/*')
        .pipe(gulp.dest('public/assets/fonts/'));
});

/*
|--------------------------------------------------------------------------
| Watch Task
|--------------------------------------------------------------------------
*/

gulp.task('watch', function() {
    gulp.watch('resources/assets/less/**/*.less', ['less']);
    gulp.watch('resources/assets/js/**/*.js',  ['js']);
});

/*
|--------------------------------------------------------------------------
| Default Task
|--------------------------------------------------------------------------
*/

gulp.task('default', ['less', 'js', 'copy']);
