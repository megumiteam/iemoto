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
    .pipe($.minifyCss({keepSpecialComments: 1, target: './'}))
    .pipe($.replace(/<%= pkg.version %>/g, pkg.version))
    .pipe(gulp.dest('./'))
});


// watch
gulp.task('watch', function () {
  gulp.watch('js/{%= file_name %}.js', ['js']);
  gulp.watch(['_sass/*.scss', '_sass/*/*.scss'], ['compass']);
});


// default task
gulp.task('default',['js','compass']);
