<?php
/**
 * Icon library shared by Services, Portfolio and Values content.
 * Editors pick an icon from a dropdown (ACF select field) instead of
 * pasting SVG code - this file maps that choice to the actual markup.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Returns the list of icon choices for ACF select fields.
 * key => human label shown in the dropdown.
 */
function mck_icon_choices() {
	return array(
		'bukiety'     => __( 'Bukiet', 'mck' ),
		'kompozycje'  => __( 'Wazon / kompozycja', 'mck' ),
		'sluby'       => __( 'Obrączki (śluby)', 'mck' ),
		'dekoracje'   => __( 'Budynek (dekoracje)', 'mck' ),
		'upominki'    => __( 'Prezent', 'mck' ),
		'dostawa'     => __( 'Dostawa (samochód)', 'mck' ),
		'zegar'       => __( 'Zegar 24h', 'mck' ),
		'lokalizacja' => __( 'Pinezka lokalizacji', 'mck' ),
		'telefon'     => __( 'Słuchawka telefonu', 'mck' ),
		'koperta'     => __( 'Koperta (e-mail)', 'mck' ),
		'whatsapp'    => __( 'Dymek (WhatsApp)', 'mck' ),
		'kwiat-petla' => __( 'Kwiatowa pętla', 'mck' ),
		'nasiono'     => __( 'Pąk / nasiono', 'mck' ),
		'serce'       => __( 'Serce', 'mck' ),
		'liscie'      => __( 'Liść', 'mck' ),
		'inspiracja'  => __( 'Kwiat ozdobny', 'mck' ),
		'wideo'       => __( 'Kamera / wideo', 'mck' ),
	);
}

/**
 * Returns the raw <path>/<circle>/<rect> markup for an icon key,
 * ready to drop inside an <svg viewBox="0 0 24 24">...</svg> wrapper.
 */
function mck_icon_paths( $key ) {
	$icons = array(
		'bukiety'     => '<path d="M12 21c0-4 .6-6.5 2-9"/><circle cx="8.6" cy="8.4" r="2.3"/><circle cx="13.2" cy="6.6" r="2.3"/><circle cx="16.4" cy="10.4" r="2.3"/><circle cx="11.6" cy="11.2" r="1.6" fill="currentColor" stroke="none"/>',
		'kompozycje'  => '<path d="M9 3.5h6"/><path d="M10 3.5v2.3c0 .6-.3 1-.7 1.5C7.8 8.9 7 10.8 7 13c0 3.9 2.2 7 5 7s5-3.1 5-7c0-2.2-.8-4.1-2.3-5.7-.4-.5-.7-.9-.7-1.5V3.5"/><path d="M7.6 13h8.8"/>',
		'sluby'       => '<circle cx="9.5" cy="14.5" r="4"/><circle cx="16" cy="13" r="3"/><path d="M16 10 15 6.5h2L16 10Z"/>',
		'dekoracje'   => '<path d="M4 20.5h16"/><path d="M5.5 20.5V10.5"/><path d="M9 20.5V10.5"/><path d="M15 20.5V10.5"/><path d="M18.5 20.5V10.5"/><path d="M3 10.5 12 5l9 5.5Z"/><path d="M3 22.2h18"/>',
		'upominki'    => '<rect x="4" y="9.5" width="16" height="10" rx="1"/><path d="M4 9.5h16"/><path d="M12 9.5v10"/><path d="M12 9.5c-1-2.6-2.6-4.5-4.5-4.5-1.3 0-2 .8-2 1.8 0 1.6 1.6 2.7 3.3 2.7"/><path d="M12 9.5c1-2.6 2.6-4.5 4.5-4.5 1.3 0 2 .8 2 1.8 0 1.6-1.6 2.7-3.3 2.7"/>',
		'dostawa'     => '<rect x="2.5" y="8" width="11" height="8" rx="1"/><path d="M13.5 10.5H17l3 2.8V16h-2"/><circle cx="6.5" cy="17.5" r="1.6"/><circle cx="16" cy="17.5" r="1.6"/>',
		'zegar'       => '<circle cx="12" cy="12" r="8.2"/><path d="M12 7.5V12l3 2"/>',
		'lokalizacja' => '<path d="M12 21s7-6.3 7-11.5a7 7 0 0 0-14 0C5 14.7 12 21 12 21Z"/><circle cx="12" cy="9.5" r="2.4"/>',
		'telefon'     => '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>',
		'koperta'     => '<rect x="3" y="5.5" width="18" height="13" rx="1.2"/><path d="M4 6.5l8 6.5 8-6.5"/>',
		'whatsapp'    => '<path d="M4 5.5h16c.6 0 1 .4 1 1V15c0 .6-.4 1-1 1H9l-4 3.5V16H4c-.6 0-1-.4-1-1V6.5c0-.6.4-1 1-1Z"/>',
		'kwiat-petla' => '<circle cx="12" cy="12" r="1.6" fill="currentColor" stroke="none"/><path d="M12 10.2c-1.6-1.4-1.8-3.4-.4-4.8 1.4-1.4 3.4-1.2 4.8.4-1.4 1.6-3.4 1.8-4.4 4.4Z"/><path d="M13.8 12c1.4-1.6 3.4-1.8 4.8-.4 1.4 1.4 1.2 3.4-.4 4.8-1.6-1.4-1.8-3.4-4.4-4.4Z"/><path d="M12 13.8c1.6 1.4 1.8 3.4.4 4.8-1.4 1.4-3.4 1.2-4.8-.4 1.4-1.6 3.4-1.8 4.4-4.4Z"/><path d="M10.2 12c-1.4 1.6-3.4 1.8-4.8.4-1.4-1.4-1.2-3.4.4-4.8 1.6 1.4 1.8 3.4 4.4 4.4Z"/>',
		'nasiono'     => '<path d="M12 3.2c-2.7 2.1-3.8 4.7-3.8 6.8a3.8 3.8 0 0 0 7.6 0c0-2.1-1.1-4.7-3.8-6.8Z"/><path d="M12 13.6V21"/><path d="M12 16.2c-2-.2-3.3-1.7-3.3-3.6"/><path d="M12 18.4c2-.2 3.3-1.9 3.3-3.8"/>',
		'serce'       => '<path d="M12 20s-7.1-4.4-9.4-9C1.3 8 2.1 4.5 5.4 3.6c2.7-.7 4.8.4 6.6 2.9 1.8-2.5 3.9-3.6 6.6-2.9 3.3.9 4.1 4.4 2.8 7.4-2.3 4.6-9.4 9-9.4 9Z"/>',
		'liscie'      => '<path d="M6 21c0-8 4-13 12-15-1 8-5 13-12 15Z"/><path d="M6 21c1-4 3-7 6-9"/>',
		'inspiracja'  => '<path d="M12 3.5c-4.7 0-8.5 3.6-8.5 8.1 0 3.9 3.1 5.4 5.2 5.4.9 0 1.4-.5 1.4-1.2 0-.6-.4-.9-.7-1.3-.4-.4-.7-.8-.7-1.5 0-1.1 1-2 2.2-2h2c2.6 0 4.6-1.8 4.6-4.4 0-2.8-2.9-3.1-5.5-3.1Z"/><circle cx="7.8" cy="10.2" r=".9" fill="currentColor" stroke="none"/><circle cx="9.6" cy="7" r=".9" fill="currentColor" stroke="none"/><circle cx="14.2" cy="7" r=".9" fill="currentColor" stroke="none"/>',
		'wideo'       => '<circle cx="8" cy="17.5" r="2.4"/><path d="M10.4 17.5V5.5l7-1.6v10.4"/><circle cx="15" cy="16" r="2.4"/>',
	);

	return isset( $icons[ $key ] ) ? $icons[ $key ] : $icons['bukiety'];
}

/**
 * Echoes a full <svg>…</svg> for the given icon key.
 * Matches the markup/attributes used throughout the original static site.
 */
function mck_icon( $key, $size = '1.5em' ) {
	printf(
		'<svg viewBox="0 0 24 24" width="%1$s" height="%1$s" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">%2$s</svg>',
		esc_attr( $size ),
		mck_icon_paths( $key ) // phpcs:ignore -- fixed internal path data, not user input
	);
}
