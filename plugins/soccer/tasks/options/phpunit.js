module.exports = {
	classes: {
		dir: 'tests/'
	},
	options: {
		bin: 'vendor/bin/phpunit',
		bootstrap: 'bootstrap.php.dist',
		colors: true,
		testSuffix: 'Test.php'
	}
};
