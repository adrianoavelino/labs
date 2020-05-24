
var gulp = require( 'gulp' );
var uglify = require( 'gulp-uglify' );
var browserSync = require( 'browser-sync' );
var files = {
      js:['src/js/*.js']
    };

gulp.task( 'uglify', function() {
   gulp.src(files.js)
    .pipe( uglify() )
    .pipe( gulp.dest( 'build/js' ) );
});

gulp.task('serve', function() {

    browserSync.init({
        server: "./"
    });

});

gulp.task('watcher', function () {
    gulp.watch(files.js, ['uglify']);
    gulp.watch(files.js).on('change', browserSync.reload);
    gulp.watch("*.html").on('change', browserSync.reload);
});

gulp.task('default',['serve', 'watcher']);
