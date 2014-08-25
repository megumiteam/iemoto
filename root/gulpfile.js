var gulp = require('gulp');
var $    = require('gulp-load-plugins')();

// banner setting
var pkg    = require('./package.json');
var date = new Date();
var yyyy = date.getFullYear();
var jsbanner = ['/**',
  ' * <%= pkg.title %> - v<%= pkg.version %>',
  ' *',
  ' * <%= pkg.homepage %>',
  ' *',
  ' * Copyright ' + yyyy + ', <%= pkg.author.name %> (<%= pkg.author.url %>)',
  ' * Released under the GNU General Public License v2 or later',
  ' */',
  ''].join('\n');
var cssbanner = ['/*',
  'Theme Name: <%= pkg.title %>',
  'Theme URI: <%= pkg.homepage %>',
  'Author: <%= pkg.author.name %>',
  'Author URI: <%= pkg.author.url %>',
  'Description: <%= pkg.description %>',
  'Version: <%= pkg.version %>',
  'License: GNU General Public License v2 or later',
  'License URI: http://www.gnu.org/licenses/gpl-2.0.html',
  'Text Domain: {%= prefix %}',
  'Tags:',
  '',
  'This theme, like WordPress, is licensed under the GPL.',
  'Use it to make something cool, have fun, and share what you\'ve learned with others.',
  '',
  'Resetting and rebuilding styles have been helped along thanks to the fine work of',
  'Eric Meyer http://meyerweb.com/eric/tools/css/reset/index.html',
  'along with Nicolas Gallagher and Jonathan Neal http://necolas.github.com/normalize.css/',
  'and Blueprint http://www.blueprintcss.org/',
  '*/'].join('\n');


// javascript
gulp.task('js', function() {
  return gulp.src('js/{%= file_name %}.js')
    .pipe($.jshint())
    .pipe($.jshint.reporter('default'))
    .pipe($.uglify({mangle: ['jQuery']}))
    .pipe($.concat('{%= file_name %}.min.js'))
    .pipe($.header(jsbanner, { pkg : pkg }))
    .pipe(gulp.dest('js'))
});


// compass(sass)
gulp.task('compass', function() {
  gulp.src('_sass/*.scss')
    .pipe($.compass({
      css: 'css',
      sass: '_sass',
      image: 'images',
      style: 'expanded',
      sourcemap: true
    }))
    .pipe($.minifyCss())
    .pipe($.header(cssbanner, { pkg : pkg }))
    .pipe(gulp.dest('./'))
});


// watch
gulp.task('watch', function () {
  gulp.watch('js/{%= file_name %}.js', ['js']);
  gulp.watch(['_sass/*.scss', '_sass/*/*.scss'], ['compass']);
});


// default task
gulp.task('default',['js','compass']);
