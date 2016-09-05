<?php

namespace Soccer;

class Plugin {

	public $taxonomies;
	public $admin_support;
	public $post_types;
	public $router;
	public $shortcodes;
	public $search;

	static public $instance;
	static public function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new Plugin();
		}

		return self::$instance;
	}

	public function enable() {
		add_action( 'init', array( $this, 'init' ) );
		add_action( 'admin_init', array( $this, 'init_admin' ) );
		add_action( 'admin_menu', array( $this, 'init_admin_menu' ) );
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_backend_scripts' ], 100);
		add_action( 'admin_enqueue_scripts', [ $this, 'admin_styles' ], 100);
		add_action( 'plugins_loaded', array( $this, 'init_after_plugins' ) );
	}

	/* helpers */

	function init() {
		$this->init_taxonomies();
		$this->init_post_types();
		$this->init_router();
		$this->init_shortcodes();

		if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
			$this->init_ajax_handlers();
		}
	}

	function init_admin() {

	}

	function init_admin_menu() {

	}

	function init_after_plugins() {

	}

	/* Custom Post Types */

	function init_post_types() {
		foreach ( $this->get_post_types() as $post_type ) {
			$post_type->register();
		}
	}

	function get_post_types() {
		if ( is_null( $this->post_types ) ) {
			$this->post_types                              = array();
			$this->post_types[ CONTENT_PACKAGE_POST_TYPE ] = new PostTypes\Match();
		}

		return $this->post_types;
	}

	/* Taxonomies */

	function init_taxonomies() {
		foreach ( $this->get_taxonomies() as $taxonomy ) {
			$taxonomy->register();
		}
	}

	function get_taxonomies() {
		if ( is_null( $this->taxonomies ) ) {
			$this->taxonomies                         = array();

		}

		return $this->taxonomies;
	}

	function get_taxonomy( $name ) {
		$taxonomies = $this->get_taxonomies();
		return $taxonomies[ $name ];
	}

	/* Admin Support */

	function init_admin_support() {
		foreach ( $this->get_admin_support() as $support ) {
			if ( $support->can_register() ) {
				$support->register();
			}
		}
	}

	function get_admin_support() {
		if ( is_null( $this->admin_support ) ) {
			$this->admin_support                         = array();

		}

		return $this->admin_support;
	}

	/* Custom Routes */

	function init_router() {

	}

	/* Shortcodes */

	function init_shortcodes() {

	}

	/* AJAX Handlers */

	function init_ajax_handlers() {
		$handlers   = array();

		foreach ( $handlers as $handler ) {
			$handler->register();
		}
	}


	public function enqueue_backend_scripts() {
		$baseurl = MSGN_PLUGIN_URL;
		$min     = defined( 'SCRIPT_DEBUG' ) && filter_var( SCRIPT_DEBUG, FILTER_VALIDATE_BOOLEAN ) ? '' : '.min';

		wp_enqueue_script(
			'msgn-admin',
			"{$baseurl}assets/js/msg-networks-admin{$min}.js",
			array(
				'jquery',
				'underscore',
				'backbone'
			),
			MSGN_VERSION,
			true
		);

	}

	/**
	 * Enqueue styles for front-end.
	 *
	 * @uses  wp_enqueue_style() to load front end styles.
	 *
	 * @since 0.1.0
	 *
	 * @return void
	 */
	function admin_styles() {
		$min   = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

		wp_enqueue_style(
			'msgn',
			MSGN_PLUGIN_URL . "/assets/css/msgn-admin{$min}.css",
			array(),
			MSGN_VERSION
		);

	}

}
