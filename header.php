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

<body <?php body_class('nav-open'); ?> id="top">

<nav id="site-navigation" class="main-navigation" role="navigation">
	<div class="nav-header">
		<div class="site-search"><?php get_search_form( true ); ?></div>
	</div>

	<ul class="pagenav" id="pagenav">
		<?php
			$pageClass = 'page-item-' . $_GET['page_id'];
			$menu = get_option( 'acucr_menu' );

			$menu = str_replace($pageClass . '"', $pageClass . ' current_page_item"', $menu);
			$menu = str_replace($pageClass . ' page_item_has_children"', $pageClass . ' page_item_has_children current_page_item"', $menu);

			echo $menu;
		?>
	</ul>

	<div class="scroll" id="scroll"></div>
	<footer class="nav-footer">
		<p><small><strong>A Church University Chaplaincy Resource</strong> is run by Rev. Dr. Jeremy Law. It was built by <a href="http://www.nevisonhardy.co.uk"><strong>Nevison Hardy Creative</strong></a> using the <a href="http://www.wordpress.org"><strong>Wordpress</strong></a> platform.</small></p>
	</footer>
</nav><!-- #site-navigation -->

<div id="page" class="hfeed site">

	<button class="nav-reveal" id="nav-reveal">Site Map</button>
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'acucr' ); ?></a>


	<div id="content" class="site-content">
