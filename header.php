<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package acucr
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<script src="//use.typekit.net/udj1vna.js"></script>
<script>try{Typekit.load();}catch(e){}</script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="top">

<nav id="site-navigation" class="main-navigation" role="navigation">
	<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php _e( '&#9776; Menu', 'acucr' ); ?></button>
	<ul class="pagenav">
		<?php
			$walker = new Custom_Walker();
			wp_list_pages(array(
				'title_li' => '',
				'walker' => $walker
			));
		?>
	</ul>
</nav><!-- #site-navigation -->

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'acucr' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h2 class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php echo get_template_directory_uri(); ?>/img/logo-small.png" alt="Site logo" class="site-logo">
					<?php bloginfo( 'name' ); ?>
				</a>
			</h2>
			<div class="site-search"><?php get_search_form( true ); ?></div>
		</div><!-- .site-branding -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
