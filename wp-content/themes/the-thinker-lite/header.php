<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package The Thinker Lite
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php do_action( 'before' ); ?>
<div id="headertop">
	<div class="page hfeed site">
		<div class="screen-reader-text skip-link">
			<a href="#content" title="<?php esc_attr_e( 'Skip to content', 'the-thinker-lite' ); ?>"><?php esc_html_e( 'Skip to content', 'the-thinker-lite' ); ?></a>
		</div><!-- .screen-reader-text skip-link -->
		<nav id="site-navigation" class="navigation-main" role="navigation">
			<button class="menu-toggle anarielgenericon" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'the-thinker-lite' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</div><!-- .page --> 
</div><!-- #headertop -->
<?php $header_image = get_header_image();
if ( ! empty( $header_image ) ) { ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="header-image-link"> <img class="headerimage" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /> </a>
<?php } ?>
<header id="masthead" class="site-header" role="banner">
	<div class="page hfeed site">
		<?php thinker_the_custom_logo(); ?>
		<div class="site-branding">
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<p class="site-description"><?php bloginfo( 'description' ); ?></p>
		</div><!-- .site-branding -->
	</div><!-- .page -->
</header><!-- #masthead --> 