<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<script>document.documentElement.classList.add("js");</script>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- HEADER -->
<header class="site-header">
	<div class="container">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand">
			<?php $logo = mck_setting( 'logo' ); if ( $logo ) : ?>
				<img src="<?php echo esc_url( $logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
			<?php endif; ?>
			<span class="brand-text"><strong><?php bloginfo( 'name' ); ?></strong><span><?php bloginfo( 'description' ); ?></span></span>
		</a>

		<nav class="main-nav">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => false,
				'items_wrap'     => '%3$s',
				'fallback_cb'    => false,
				'walker'         => new MCK_Nav_Walker(),
			) );
			?>
		</nav>

		<div class="header-actions">
			<?php get_template_part( 'template-parts/lang-switch' ); ?>
			<a href="<?php echo esc_url( mck_tel_href() ); ?>" class="icon-link" aria-label="<?php echo esc_attr( mck_str( 'call_us_aria' ) ); ?>">
				<?php get_template_part( 'template-parts/icon-phone' ); ?>
			</a>
			<a href="<?php echo esc_url( mck_url_kontakt() ); ?>" class="btn btn-primary btn-sm"><?php mck_e( 'order_flowers' ); ?></a>
			<button class="nav-toggle" aria-label="<?php echo esc_attr( mck_str( 'menu_open' ) ); ?>"><span></span><span></span><span></span></button>
		</div>
	</div>
</header>

<!-- MOBILE NAV -->
<div class="mobile-nav">
	<button class="close-nav" aria-label="<?php echo esc_attr( mck_str( 'menu_close' ) ); ?>">✕</button>
	<?php
	wp_nav_menu( array(
		'theme_location' => 'primary',
		'container'      => false,
		'items_wrap'     => '%3$s',
		'fallback_cb'    => false,
		'walker'         => new MCK_Nav_Walker(),
	) );
	?>
	<?php get_template_part( 'template-parts/lang-switch' ); ?>
</div>
