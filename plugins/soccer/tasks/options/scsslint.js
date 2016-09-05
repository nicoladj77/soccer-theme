module.exports = {
	allFiles: [
		'assets/css/sass/**/*.scss'
	],
	options: {
		compact: true,
		config: '.scss-lint.yml',
		colorizeOutput: true,
		exclude: [
			'assets/css/sass/base/_normalize.scss',
			'assets/css/sass/base/_wordpress.scss',
			'assets/css/sass/global/_mq.scss',
			'node_modules'
		]
	}
};