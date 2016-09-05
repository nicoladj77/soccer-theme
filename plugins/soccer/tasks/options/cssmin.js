module.exports = {
	options: {
		banner: '/*! <%= pkg.title %> - v<%= pkg.version %>\n' +
		' * <%=pkg.homepage %>\n' +
		' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
		' * Licensed GPL-2.0+' +
		' */\n'
	},
	minify: {
		expand: true,

		cwd: 'assets/css/',
		src: [
			'msg-networks.css',
			'msgn-admin.css',
			'sharelines_support.css',
			'selectize.default.css',
			'media-browser.css',
		],

		dest: 'assets/css/',
		ext: '.min.css'
	},


	media_browser: {
		files: {
			'assets/css/media-browser.dist.css': [
				'assets/css/selectize.default.css',
				'assets/css/media-browser.css',
			]
		}
	}
};
