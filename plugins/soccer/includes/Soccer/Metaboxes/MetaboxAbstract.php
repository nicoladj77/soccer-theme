<?php

namespace Soccer\Metaboxes;

abstract class MetaboxAbstract {

	abstract protected function render_metabox_html();

	public $post_type;

	public static function get_name() {
		// Method is not abstract as static method should never be abstract
		throw new \Exception( 'You must add a name for the metabox in concrete classes' );
	}

	public function __construct(
		$post_type,
		$meta_box_options = array(),
		$post_finder_options = array()
	) {

		$this->post_type           = $post_type;
		$this->meta_box_options    = wp_parse_args( $meta_box_options, $this->meta_box_options );
		$this->post_finder_options = wp_parse_args( $post_finder_options, $this->post_finder_options );
	}

	public function register() {
		add_action(
			'add_meta_boxes', array( $this, 'add_meta_box_if' )
		);

		add_action(
			'save_post', array( $this, 'did_save_post' )
		);
	}

	/* Conditional Registration */
	function add_meta_box_if() {
		if ( $this->can_register() ) {
			$this->add_meta_box();
		}
	}

	function add_meta_box() {
		add_meta_box(
			static::get_name() . "-$this->post_type",
			$this->meta_box_options['title'],
			array( $this, 'render' ),
			$this->meta_box_options['screen'],
			$this->meta_box_options['context']
		);
	}


	function can_register() {
		return $this->post_type === $this->get_request_post_type();
	}

	/* Post Finder display helpers */

	function render() {
		wp_nonce_field(
			$this->get_nonce_action(),
			$this->get_nonce_name(),
			false,
			true
		);


		$this->render_metabox_html();
	}

	function get_stored_picks() {
		global $post;

		if ( ! empty( $post ) && ! empty( $post->ID ) ) {
			return get_post_meta(
				$post->ID,
				$this->get_store_as(),
				true
			);
		} else {
			return '';
		}
	}

	/* Post Finder Meta Helpers */

	function get_store_as() {
		return $this->post_finder_options['store_as'];
	}

	function get_request_post_type() {
		global $post;

		if ( ! empty( $post ) && ! empty( $post->post_type ) ) {
			return $post->post_type;
		} else {
			return false;
		}
	}

	function get_post_id() {
		global $post;

		if ( ! empty( $post ) && ! empty( $post->ID ) ) {
			return $post->ID;
		} else {
			return 0;
		}
	}


	/* Persistance Helpers */

	function did_save_post() {
		if ( $this->can_save_picks() ) {
			remove_action(
				'save_post', array( $this, 'did_save_post' )
			);

			return $this->save_picks();
		}

		return false;
	}

	function save_picks() {
		$post_id = $this->get_post_id();
		$picks   = $this->get_request_picks();
		do_action( 'save_' . static::get_name() . '_metabox', $post_id, $picks );


		return update_post_meta(
			$post_id,
			$this->get_store_as(),
			$picks
		);
	}

	function can_save_picks() {
		$result = wp_verify_nonce(
			$this->get_request_nonce(),
			$this->get_nonce_action()
		);

		return $result !== false;
	}

	function get_request_nonce() {
		$key = $this->get_nonce_name();

		if ( ! empty( $_REQUEST[ $key ] ) ) {
			return sanitize_text_field(
				$_REQUEST[ $key ]
			);
		} else {
			return '';
		}
	}

	function get_request_picks() {
		$key = $this->get_store_as();

		if ( ! empty( $_REQUEST[ $key ] ) ) {
			$request_picks = sanitize_text_field(
				$_REQUEST[ $key ]
			);

			$request_picks = ! empty( $request_picks ) ? $request_picks : '';
		} else {
			$request_picks = '';
		}

		return $request_picks;
	}

	function get_nonce_action() {
		return static::get_name() . "_{$this->post_type}_save";
	}

	function get_nonce_name() {
		return static::get_name() . "_{$this->post_type}_nonce";
	}
}