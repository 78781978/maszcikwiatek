<?php
/**
 * PL/EN switcher pill - reuses Polylang's language list but renders it
 * with the site's own markup/classes instead of Polylang's default list.
 * Renders nothing if Polylang isn't active (nothing to switch between).
 */

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! function_exists( 'pll_the_languages' ) ) {
	return;
}

$languages = pll_the_languages( array( 'raw' => 1 ) );
if ( empty( $languages ) || ! is_array( $languages ) ) {
	return;
}
?>
<div class="lang-switch" role="group" aria-label="<?php echo esc_attr( mck_str( 'lang_switch_aria' ) ); ?>">
	<?php foreach ( $languages as $lang ) : ?>
		<?php if ( ! empty( $lang['current_lang'] ) ) : ?>
			<span class="is-active"><?php echo esc_html( strtoupper( $lang['slug'] ) ); ?></span>
		<?php else : ?>
			<a href="<?php echo esc_url( $lang['url'] ); ?>"><?php echo esc_html( strtoupper( $lang['slug'] ) ); ?></a>
		<?php endif; ?>
	<?php endforeach; ?>
</div>
