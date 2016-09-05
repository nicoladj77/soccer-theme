<?php

namespace Soccer\Metaboxes;


class Calls extends MetaboxAbstract {

	public $meta_box_options = array(
		'title'    => 'Convocations',
		'screen'   => null,
		'context'  => 'advanced',
		'priority' => 'high',
	);

	public $post_finder_options = array(
		'store_as' => 'game_picks',
	);

	public static function get_name() {
		return 'calls';
	}

	protected function render_metabox_html() {
		\Soccer\load_template(
			'partials/metabox/calls.php',
			[
				'users' => get_users()
			]
		);
	}


}