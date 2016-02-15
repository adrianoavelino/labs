
var gulp = require( 'gulp' );
var browserSync = require( 'browser-sync' );
var files = {};

gulp.task('serve', function() {

    browserSync.init({
        server: "./"
    });

});

gulp.task('watcher', function () {

    // gulp.watch(files.js).on('change', browserSync.reload);
    gulp.watch("*.html").on('change', browserSync.reload);
    gulp.watch("*.js").on('change', browserSync.reload);
    gulp.watch("*.css").on('change', browserSync.reload);
});

gulp.task('default',['serve', 'watcher']);
