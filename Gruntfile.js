module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    sass: {
        dist: {
          options: {                       // Target options
              style: 'compressed',  
              compass: true
          },
            files: {
            's/css/nwc.min.css': 's/scss/site.scss'
          }
        }
      },
      uglify: {
          options: {
            mangle: false,
            //beautify: true
          },
          buildMainJS: {
            files: {
                's/js/app.min.js':[
                    's/js/init.js',
                    's/js/nwcCtrl.js',
                    's/js/services.js'
                ]
            }
          }
      },
  });

    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.registerTask('default', ['sass']);
};