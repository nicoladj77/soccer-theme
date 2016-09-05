module.exports = {
	options: {
		stripBanners: true,
			banner: '/*! <%= pkg.title %> - v<%= pkg.version %>\n' +
		' * <%= pkg.homepage %>\n' +
		' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
		' * Licensed GPL-2.0+' +
		' */\n'
	},

	media_browser: {
		src: [
			/* utils */
			'utils/selectize.js',
			'utils/utils.js',

			/* underscore templates */
			'templates.js',

			/* models */
			'models/*.js',

			/* collections */
			'collections/*.js',

			/* views */
			'views/*.js',

			/* controller */
			'controller.js',

			/* app */
			'app.js'
		].map( function ( file ) {
				return 'assets/js/src/media-browser/' + file;
			} ),
		dest: 'assets/js/media-browser.js'
	},
	game_picker: {
		src: [
			/* utils */
			'utils/utils.js',

			/* underscore templates */
			'templates.js',

			/* models */
			'models/*.js',

			/* collections */
			'collections/*.js',

			/* views */
			'views/*.js',

			/* controller */
			'game-picker.js',

		].map( function ( file ) {
			return 'assets/js/src/admin/game-picker/' + file;
		} ),
		dest: 'assets/js/game-picker.js'
	},

	admin: {
		src: [
			'assets/js/selectize.js',
			'assets/js/src/admin/*.js',
			'assets/js/game-picker.js'
		],
		dest: 'assets/js/msg-networks-admin.js'
	},

	front: {
		src: [
			'assets/js/src/*.js',
		],
		dest: 'assets/js/msg-networks.js'
	},
};
