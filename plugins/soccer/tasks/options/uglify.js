module.exports = {
	all: {
		files: {
			'assets/js/msg-networks.min.js': ['assets/js/msg-networks.js'],
			'assets/js/msg-networks-admin.min.js': ['assets/js/msg-networks-admin.js'],
			'assets/js/sharelines_support.min.js': ['assets/js/sharelines_support.js'],

		},
		options: {
			banner: '/*! <%= pkg.title %> - v<%= pkg.version %>\n' +
			' * <%= pkg.homepage %>\n' +
			' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
			' * Licensed GPL-2.0+' +
			' */\n',
			mangle: {
				except: ['jQuery']
			}
		}
	},

	media_browser: {
		files: {
			'assets/js/media-browser.min.js': ['assets/js/media-browser.js'],
			'assets/js/media-browser.dist.js': [
				'assets/js/wp_ajax_api.js',
				'assets/js/selectize.js',
				'assets/js/backbone.collectionView.js',
				'assets/js/media-browser.js',
			]
		}
	}
};
