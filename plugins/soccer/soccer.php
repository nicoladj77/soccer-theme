<?php
/**
 * Plugin Name: Soccer
 * Description: Soccer
 * Version:     0.2.0
 * Author:      Nicola Peluchetti
 * Text Domain: soccer
 * Domain Path: /languages
 */

require_once( __DIR__ . '/config.php' );

/**
 *
 * Loads the Plugin's PHP autoloader.
 */
function msgn_autoload() {
	if ( msgn_can_autoload() ) {
		require_once( msgn_autoloader() );

		return true;
	} else {
		return false;
	}
}

/**
 * In server mode we can autoload if autoloader file exists. For
 * test environments we prevent autoloading of the plugin to prevent
 * global pollution and for better performance.
 */
function msgn_can_autoload() {
	if ( ! defined( 'PHPUNIT_RUNNER' ) ) {
		if ( file_exists( msgn_autoloader() ) ) {
			return true;
		} else {
			error_log(
				"Fatal Error: Composer not setup in " . MSGN_PLUGIN_DIR
			);

			return false;
		}
	} else {
		return false;
	}
}

/**
 * Defaults is Composer's autoloader
 */
function msgn_autoloader() {
	return MSGN_PLUGIN_DIR . '/vendor/autoload.php';
}

/**
 * Plugin code entry point. Singleton instance is used to maintain single
 * instance of the plugin throughout the current lifecycle.
 */
function msgn_autorun() {
	if ( msgn_autoload() ) {
		$plugin = \Soccer\Plugin::get_instance();
		$plugin->enable();
		
	} else {
		add_action( 'admin_notices', 'msgn_autoload_notice' );
	}
}

function msgn_autoload_notice() {
	$class = 'notice notice-error';
	$message = __( 'Autoload is not setup. Remember to run composer install on both the MSGN plugin and theme', 'msgn' );

	printf( '<div class="%1$s"><p>%2$s</p></div>', $class, $message );
}

msgn_autorun();
