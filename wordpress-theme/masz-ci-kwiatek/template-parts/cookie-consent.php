<?php
/**
 * Cookie banner + full preferences modal. Markup/classes/data-*
 * attributes match assets/js/main.js exactly (ported unchanged from
 * the static site) - do not rename them without updating main.js too.
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<div class="cookie-banner">
	<p><?php echo esc_html( mck_str( 'cookie_text' ) ); ?> <a href="<?php echo esc_url( mck_url_polityka() . '#cookies' ); ?>" style="color:var(--pink-2);"><?php mck_e( 'cookie_policy' ); ?></a>.</p>
	<div class="cookie-actions">
		<button class="btn btn-primary btn-sm" data-cookie="accept"><?php mck_e( 'cookie_accept' ); ?></button>
		<button class="btn btn-outline btn-sm" data-cookie="reject"><?php mck_e( 'cookie_reject' ); ?></button>
		<button class="btn btn-text btn-sm" data-cookie="settings"><?php mck_e( 'cookie_settings' ); ?></button>
	</div>
</div>

<div class="cookie-modal-backdrop" data-cookie-backdrop></div>
<div class="cookie-modal" role="dialog" aria-modal="true" aria-labelledby="cookie-modal-title">
	<button type="button" class="cookie-modal-close" data-cookie="close" aria-label="<?php echo esc_attr( mck_str( 'cookie_close_aria' ) ); ?>">&times;</button>
	<h3 id="cookie-modal-title"><?php mck_e( 'cookie_modal_title' ); ?></h3>
	<p><?php mck_e( 'cookie_modal_text' ); ?></p>
	<div class="cookie-cat">
		<div class="cookie-cat-info"><strong><?php mck_e( 'cookie_necessary' ); ?></strong><span><?php mck_e( 'cookie_necessary_d' ); ?></span></div>
		<div class="a11y-switch on" aria-hidden="true"></div>
	</div>
	<div class="cookie-cat">
		<div class="cookie-cat-info"><strong><?php mck_e( 'cookie_analytics' ); ?></strong><span><?php mck_e( 'cookie_analytics_d' ); ?></span></div>
		<button type="button" class="a11y-switch" data-cookie-toggle="analytics" aria-pressed="false" aria-label="<?php mck_e( 'cookie_analytics' ); ?>"></button>
	</div>
	<div class="cookie-cat">
		<div class="cookie-cat-info"><strong><?php mck_e( 'cookie_marketing' ); ?></strong><span><?php mck_e( 'cookie_marketing_d' ); ?></span></div>
		<button type="button" class="a11y-switch" data-cookie-toggle="marketing" aria-pressed="false" aria-label="<?php mck_e( 'cookie_marketing' ); ?>"></button>
	</div>
	<div class="cookie-modal-actions">
		<button class="btn btn-primary btn-sm" data-cookie="save"><?php mck_e( 'cookie_save' ); ?></button>
		<button class="btn btn-outline btn-sm" data-cookie="accept-all-modal"><?php mck_e( 'cookie_accept_all' ); ?></button>
	</div>
</div>
