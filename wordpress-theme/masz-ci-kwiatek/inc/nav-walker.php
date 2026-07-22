<?php
/**
 * The original design has nav links as flat <a> siblings (no <li>,
 * no <ul>) styled with flexbox on the parent - this walker outputs
 * exactly that, so the ported CSS doesn't need to change.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class MCK_Nav_Walker extends Walker_Nav_Menu {

	public function start_lvl( &$output, $depth = 0, $args = null ) {}
	public function end_lvl( &$output, $depth = 0, $args = null ) {}

	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$classes  = empty( $item->classes ) ? array() : (array) $item->classes;
		$is_active = array_intersect( array( 'current-menu-item', 'current_page_item', 'current-menu-parent' ), $classes );

		$attrs = ' href="' . esc_url( $item->url ) . '"';
		if ( $is_active ) {
			$attrs .= ' class="active"';
		}

		$output .= '<a' . $attrs . '>' . esc_html( $item->title ) . '</a>';
	}

	public function end_el( &$output, $item, $depth = 0, $args = null ) {}
}
