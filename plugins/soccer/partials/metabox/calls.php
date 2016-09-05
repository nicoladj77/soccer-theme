<div class="player-calls">
	<?php foreach ( $template_args['users'] as $user ) : ?>
		<label>
			<input type="checkbox" name="player_called[]" class="player">
			<?php echo esc_html( $user->display_name  ) ?>
		</label>

	<?php endforeach; ?>
</div>