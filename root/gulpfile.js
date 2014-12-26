var gulp = require('gulp');
var $    = require('gulp-load-plugins')();
var pkg  = require('./package.json');

// javascript
gulp.task('js', function() {
  return gulp.src('js/{%= file_name %}.js')
    .pipe($.jshint())
    .pipe($.jshint.reporter('default'))
    .pipe($.notify(function (file) {
      if (file.jshint.success) {
        return false;
      }

      var errors = file.jshint.results.map(function (data) {
        if (data.error) {
          return "(" + data.error.line + ':' + data.error.character + ') ' + data.error.reason;
        }
      }).join("\n");
      return file.relative + " (" + file.jshint.results.length + " errors)\n" + errors;
    }))
    .pipe(gulp.dest('js'))
});

// compass(sass)
gulp.task('compass', function() {
  // dev
  gulp.src('sass/*.scss')
    .pipe($.plumber({
      errorHandler: $.notify.onError("Error: <%= error.message %>")
    }))
    .pipe($.compass({
      sass:      'sass',
      css:       'css',
      image:     'images',
      style:     'expanded',
      relative:  true,
      sourcemap: true,
      comments:  true,
      force:     true
    }))
    .pipe($.replace(/<%= pkg.version %>/g, pkg.version))
    .pipe(gulp.dest('css'))

  // dist
  gulp.src('sass/*.scss')
    .pipe($.plumber({
      errorHandler: $.notify.onError("Error: <%= error.message %>")
    }))
    .pipe($.compass({
      sass:      'sass',
      css:       './',
      image:     'images',
      style:     'expanded',
      relative:  true,
      sourcemap: false,
      comments:  false,
      force:     true
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
