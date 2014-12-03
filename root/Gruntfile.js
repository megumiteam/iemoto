/* vim: set ft=javascript expandtab shiftwidth=2 tabstop=2: */

module.exports = function( grunt ) {

  // Project configuration
  grunt.initConfig( {
    pkg: grunt.file.readJSON( 'package.json' ),

    // javascript
    jshint: {
      dist: [
        'js/{%= file_name %}.js'
      ],
      options: {
        jshintrc: true
      }
    },

    // compass(sass)
    compass: {
      dev: {
        options: {
          sassDir:        'sass',
          cssDir:         'css',
          imagesDir:      'images',
          outputStyle:    'expanded',
          relativeAssets: true,
          noLineComments: true,
          sourcemap:      true,
          force:          true
        }
      },
      dist: {
        options: {
          sassDir:        'sass',
          cssDir:         './',
          imagesDir:      'images',
          outputStyle:    'expanded',
          relativeAssets: true,
          noLineComments: true,
          sourcemap:      false,
          force:          true
        }
      }
    },
    replace: {
      dist: {
        src: ['css/style.css', 'style.css'],
        overwrite: true,
        replacements: [{
          from: /<%= pkg.version %>/g,
          to: '<%= pkg.version %>'
         }]
      }
    },

    // watch
    watch: {
      dist: {
        files: [
          'sass/{,*/}{,*/}*.scss',
          'js/{%= file_name %}.js'
        ],
        tasks: ['jshint', 'compass', 'replace']
      }
    }

  } );

  // Load other tasks
  require('load-grunt-tasks')(grunt);

  // Default task.
  grunt.registerTask(
    'default',
    ['jshint', 'compass', 'replace']
  );

  grunt.util.linefeed = '\n';
};
