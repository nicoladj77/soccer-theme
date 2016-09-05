<?php

namespace Soccer\PostTypes;

use Soccer\Metaboxes\Calls;

class Match {
	public function register() {
		register_post_type(
			$this->get_name(),
			$this->get_options()
		);

		$calls = new Calls( $this->get_name() );

		$calls->register();
	}

	function get_name() {
		return 'match';
	}

	function get_labels() {
		return array(
			'name'               => _x( 'Match', 'post type general name', 'msgn' ),
			'singular_name'      => _x( 'Match', 'post type singular name', 'msgn' ),
			'menu_name'          => _x( 'Match', 'admin menu', 'msgn' ),
			'name_admin_bar'     => _x( 'Match', 'add new on admin bar', 'msgn' ),
			'add_new'            => _x( 'Add New', 'Curated Spot', 'msgn' ),
			'add_new_item'       => __( 'Add New Match', 'msgn' ),
			'new_item'           => __( 'New Match', 'msgn' ),
			'edit_item'          => __( 'Edit Match', 'msgn' ),
			'view_item'          => __( 'View Match', 'msgn' ),
			'all_items'          => __( 'All Matches', 'msgn' ),
			'search_items'       => __( 'Search Matches', 'msgn' ),
			'parent_item_colon'  => __( 'Parent Match:', 'msgn' ),
			'not_found'          => __( 'No Match found.', 'msgn' ),
			'not_found_in_trash' => __( 'No Match found in Trash.', 'msgn' )
		);
	}

	function get_options() {
		return array(
			'labels'              => $this->get_labels(),
			'supports'            => $this->get_supports(),
			'public'              => true,
		);
	}

	function get_supports() {
		return array( 'title', 'editor', 'thumbnail' );
	}

}