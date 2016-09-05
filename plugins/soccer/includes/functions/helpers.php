<?php

namespace Soccer;

function load_template( $_template_file, $template_args = [] ) {
	global $posts, $post, $wp_did_header, $wp_query, $wp_rewrite, $wpdb, $wp_version, $wp, $id, $comment, $user_ID;
	require( trailingslashit( MSGN_PLUGIN_DIR ) . $_template_file );
}