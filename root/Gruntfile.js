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
    uglify: {
      all: {
        files: {
          'js/{%= file_name %}.min.js': [
            'js/{%= file_name %}.js'
          ]
        },
        options: {
          banner: '/**\n' +
            ' * <%= pkg.title %> - v<%= pkg.version %>\n' +
            ' *\n' +
            ' * <%= pkg.homepage %>\n' +
            ' *\n' +
            ' * Copyright <%= grunt.template.today("yyyy") %>, <%= pkg.author.name %> (<%= pkg.author.url %>)\n' +
            ' * Released under the GNU General Public License v2 or later\n' +
            ' */\n',
          mangle: {
            except: ['jQuery']
          }
        }
      }
    },

    // compass(sass)
    compass: {
      dist: {
        options: {
          sassDir:     '_sass',
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
        tasks: ['jshint', 'uglify', 'compass', 'cssmin', 'replace']
      }
    }

  } );

  // Load other tasks
  require('load-grunt-tasks')(grunt);

  // Default task.
  grunt.registerTask(
    'default',
    ['jshint', 'uglify', 'compass', 'cssmin', 'replace']
  );

  grunt.util.linefeed = '\n';
};
