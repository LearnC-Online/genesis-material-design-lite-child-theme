<?php
// Add Shortcode
function lco_render_practice_features() {
	ob_start();
	?>

	<div class="lco-practice-features-container mdl-grid">
		<div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone">
			<img src="<?= get_stylesheet_directory_uri() . '/shortcodes/assets/img/no-install.svg' ?>" alt="<?=__('No Install', LCO_THEME) ?>">
			<h3>No Install</h3>
		</div>
		<div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone">
			<img src="<?= get_stylesheet_directory_uri() . '/shortcodes/assets/img/practical.svg' ?>" alt="<?=__('Practical', LCO_THEME) ?>">
			<h3>Practical</h3>
		</div>
		<div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone">
			<img src="<?= get_stylesheet_directory_uri() . '/shortcodes/assets/img/track-progress.svg' ?>" alt="<?=__('Track Progress', LCO_THEME) ?>">
			<h3>Track Progress</h3>
		</div>
		<div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone">
			<img src="<?= get_stylesheet_directory_uri() . '/shortcodes/assets/img/simple.svg' ?>" alt="<?=__('Simple', LCO_THEME) ?>">
			<h3>Simple</h3>
		</div>
	</div>

	<?php
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}
add_shortcode( 'lco_practice_features', 'lco_render_practice_features' );