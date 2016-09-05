module.exports = function( grunt ) {
	grunt.registerTask( 'mediabrowser', [
		'jst',
		'concat:media_browser',
		'cssmin:media_browser',
		'uglify:media_browser'
	]);
};
