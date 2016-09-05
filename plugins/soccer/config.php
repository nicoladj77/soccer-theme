<?php

// Useful global constants
define( 'MSGN_VERSION'      , defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? uniqid() : '0.2.0' );
define( 'MSGN_PLUGIN'       , __DIR__ . '/msgn.php' );
define( 'MSGN_PLUGIN_DIR'   , __DIR__ );
define( 'MSGN_PLUGIN_URL'   , plugin_dir_url( __FILE__ ) );
define( 'MSGN_URL'          , get_stylesheet_directory_uri() );
define( 'MSGN_TEMPLATE_URL' , get_template_directory_uri() );
define( 'MSGN_PATH'         , get_template_directory() . '/' );
define( 'MSGN_INC'          , MSGN_PATH . 'includes/' );

// Taxonomies
define( 'PERSONALITY_TAXONOMY' , 'msgn_personality' );
define( 'SPONSOR_TAXONOMY'     , 'msgn_sponsor' );
define( 'TEAM_TAXONOMY'        , 'msgn_team' );
define( 'GAME_TAXONOMY'        , 'msgn_game' );
define( 'SHOW_TAXONOMY'        , 'msgn_show' );

// Post Types
define( 'CONTENT_PACKAGE_POST_TYPE' , 'msgn_content_package' );
define( 'CURATED_SPOT_POST_TYPE'    , 'msgn_curated_spot' );
define( 'PHOTO_GALLERY_POST_TYPE'   , 'msgn_photo_gallery' );
define( 'VIDEO_POST_TYPE'           , 'msgn_video' );
define( 'SHARELINE_POST_TYPE'       , 'msgn_shareline');
define( 'SOCIAL_SHARE_POST_TYPE'    , 'msgn_social_share');

// Load Custom Config if present
if ( file_exists( __DIR__ . '/config.local.php' ) ) {
	require_once( __DIR__ . '/config.local.php' );
}
