module.exports = {
	main: {
		options: {
			mode: 'zip',
			archive: './release/msgn.<%= pkg.version %>.zip'
		},
		expand: true,
		cwd: 'release/<%= pkg.version %>/',
		src: ['**/*'],
		dest: 'msgn/'
	}
};