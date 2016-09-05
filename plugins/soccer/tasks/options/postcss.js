module.exports = {
	dist: {
		options: {
			processors: [
				require( 'autoprefixer' )( { browsers: 'last 2 versions' } ),
				require( 'postcss-svg-fragments' )( { /* options */ } )
			]
		},
		files: {
			'assets/css/msgn-admin.css': ['assets/css/msgn-admin.css']
		}
	}
};