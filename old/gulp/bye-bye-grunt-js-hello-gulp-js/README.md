# Bye-bye-grunt-js-hello-gulp-js
[fonte](http://blog.caelum.com.br/bye-bye-grunt-js-hello-gulp-js/)

Requisitos:
- node / npm

Iniciar um projeto:
```bash
$ npm init
$ sudo npm i -g gulp ou sudo npm install -g gulp
```
Instalando modulos:
```bash
$ sudo npm install gulp --save-dev
$ sudo npm install gulp-util --save-dev
$ sudo npm install gulp-uglify --save-dev
$ sudo npm install gulp-watch --save-dev
$ sudo npm install browser-sync gulp --save-dev
```
Agora crie esses diretórios:    
```
/src/js   
/build
```

Crie o arquivo [gulpfile.js](./gulpfile.js) com o seguinte conteúdo:
```js
var gulp = require( 'gulp' );
var uglify = require( 'gulp-uglify' );

gulp.task( 'default', function() {
   gulp.src( 'src/js/**/*.js' )
    .pipe( uglify() )
    .pipe( gulp.dest( 'build/js' ) );
});

```
Para gerar os arquivos minificados rode o seguinte comando
```bash
$ gulp
```

Altere o arquivo gulpfile.js da seguinte forma para minificar automaticamente após salvar o arquivo `src/js/ajax.js`:

```js
var gulp = require( 'gulp' );
var uglify = require( 'gulp-uglify' );
var files = {
      js:['src/js/*.js']
    };

gulp.task( 'uglify', function() {
   gulp.src(files.js)
    .pipe( uglify() )
    .pipe( gulp.dest( 'build/js' ) );
});

gulp.task('watcher', function () {
  gulp.watch(files.js, ['uglify']);
});

gulp.task('default',['watcher']);
```





Rode o comando gulp para executar a tarefa
```bash
$ gulp
```
Adicionando livereload com Browsersync:
Verifique o arquivo gulpfile.js alterado:
```js
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

gulp.task('serve', ['uglify'], function () {

    browserSync.init({
        server: "./"
    });

    gulp.watch(files.js).on('change', browserSync.reload);
    gulp.watch("*.html").on('change', browserSync.reload);
});

gulp.task('watcher', function () {
  gulp.watch(files.js, ['uglify']);
});

gulp.task('default',['serve']);

```
