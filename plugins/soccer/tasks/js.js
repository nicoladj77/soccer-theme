module.exports = function( grunt ) {
	grunt.registerTask( 'js', [ 'jst', 'concat', 'uglify' ] );
};
