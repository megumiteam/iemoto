/* vim: set ft=javascript expandtab shiftwidth=2 tabstop=2: */

module.exports = function( grunt ) {

  // Project configuration
  grunt.initConfig( {
    pkg: grunt.file.readJSON( 'package.json' ),

    // javascript
    jshint: {
      all: [
        'js/{%= file_name %}.js'
      ],
      options: {
        jshintrc: true
      }
    },

    // compass(sass)
    compass: {
      dist: {
        options: {
          sassDir:     'sass',
          cssDir:      'css',
          outputStyle: 'expanded',
          imagesDir:   'images',
          relativeAssets: true,
          sourcemap:   true
        }
      }
    },
    cssmin: {
      options: {
        keepSpecialComments: 1,
        target: './'
      },
      combine: {
        files: {
          'style.css': [
            'css/style.css'
          ],
          'editor-style.css': [
            'css/editor-style.css'
          ]
        }
      }
    },
    replace: {
      dist: {
        src: ['style.css'],
        overwrite: true,
        replacements: [{
          from: /<%= pkg.version %>/g,
          to: '<%= pkg.version %>'
         }]
      }
    },

    // watch
    watch: {
      scripts: {
        files: [
          '_sass/*.scss',
          '_sass/*/*.scss',
          'js/{%= file_name %}.js'
        ],
        tasks: ['jshint', 'compass', 'cssmin', 'replace']
      }
    }

  } );

  // Load other tasks
  require('load-grunt-tasks')(grunt);

  // Default task.
  grunt.registerTask(
    'default',
    ['jshint', 'compass', 'cssmin', 'replace']
  );

  grunt.util.linefeed = '\n';
};
