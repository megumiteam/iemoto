var gulp = require('gulp');
var $    = require('gulp-load-plugins')();
var pkg  = require('./package.json');

// javascript
gulp.task('js', function() {
  return gulp.src('js/{%= file_name %}.js')
    .pipe($.jshint())
    .pipe($.jshint.reporter('default'))
    .pipe(gulp.dest('js'))
});

// compass(sass)
gulp.task('compass', function() {
  // dev
  gulp.src('sass/*.scss')
    .pipe($.compass({
      sass:      'sass',
      css:       'css',
      image:     'images',
      style:     'expanded',
      relative:  true,
      sourcemap: true,
      comments:  true
    }))
    .pipe($.replace(/<%= pkg.version %>/g, pkg.version))
    .pipe(gulp.dest('css'))

  // dist
  gulp.src('sass/*.scss')
    .pipe($.compass({
      sass:      'sass',
      css:       './',
      image:     'images',
      style:     'expanded',
      relative:  true,
      sourcemap: false,
      comments:  false
    }))
    .pipe($.replace(/<%= pkg.version %>/g, pkg.version))
    .pipe(gulp.dest('./'))
});

// watch
gulp.task('watch', function () {
  gulp.watch('js/{%= file_name %}.js', ['js']);
  gulp.watch('sass/{,*/}{,*/}*.scss', ['compass']);
});

// default task
gulp.task('default',['js','compass']);
