module.exports = function (grunt) {
	grunt.registerTask( 'css', ['scsslint', 'sass', 'postcss', 'cssmin'] );
};