<?php
/**
 * Floating WCAG accessibility widget (font size, contrast, underline
 * links, readable font). Behaviour lives in assets/js/main.js, ported
 * unchanged from the static site - do not rename data-a11y values.
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<button class="a11y-toggle" id="a11y-toggle" aria-label="<?php echo esc_attr( mck_str( 'a11y_aria' ) ); ?>" aria-expanded="false" aria-controls="a11y-panel">
	<svg viewBox="0 0 24 24" width="1.5em" height="1.5em" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="8" r="1.6" fill="currentColor" stroke="none"/><path d="M7 10.6c1.6.9 3.3 1.3 5 1.3s3.4-.4 5-1.3"/><path d="M12 11.9v3.6M12 15.5l-2.2 4M12 15.5l2.2 4"/></svg>
</button>
<div class="a11y-panel" id="a11y-panel" role="dialog" aria-label="<?php echo esc_attr( mck_str( 'a11y_aria' ) ); ?>">
	<h3><?php mck_e( 'a11y_title' ); ?></h3>
	<div class="a11y-row">
		<span><?php mck_e( 'a11y_font_size' ); ?></span>
		<div class="a11y-fontbtns">
			<button type="button" data-a11y="font-dec" aria-label="<?php echo esc_attr( mck_str( 'a11y_font_dec' ) ); ?>">A&minus;</button>
			<button type="button" data-a11y="font-inc" aria-label="<?php echo esc_attr( mck_str( 'a11y_font_inc' ) ); ?>">A+</button>
		</div>
	</div>
	<div class="a11y-row">
		<span><?php mck_e( 'a11y_contrast' ); ?></span>
		<button type="button" class="a11y-switch" data-a11y="contrast" aria-pressed="false" aria-label="<?php mck_e( 'a11y_contrast' ); ?>"></button>
	</div>
	<div class="a11y-row">
		<span><?php mck_e( 'a11y_underline' ); ?></span>
		<button type="button" class="a11y-switch" data-a11y="underline" aria-pressed="false" aria-label="<?php mck_e( 'a11y_underline' ); ?>"></button>
	</div>
	<div class="a11y-row">
		<span><?php mck_e( 'a11y_readable' ); ?></span>
		<button type="button" class="a11y-switch" data-a11y="readable" aria-pressed="false" aria-label="<?php mck_e( 'a11y_readable' ); ?>"></button>
	</div>
	<button type="button" class="a11y-reset" data-a11y="reset"><?php mck_e( 'a11y_reset' ); ?></button>
</div>
