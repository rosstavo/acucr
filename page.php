<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package acucr
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<?php $image_id = get_post_thumbnail_id();
		$image_url = wp_get_attachment_image_src($image_id,'large', true); ?>

		<?php if ( !is_child() ) : ?>

			<div class="featured-image featured-image__chapter" style="background-image:url(<?php echo $image_url[0]; ?>);">
				<div class="masthead">
					<h2 class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img src="<?php echo get_template_directory_uri(); ?>/img/logo-small.png" alt="Site logo" class="site-logo"><br>
							<?php bloginfo( 'name' ); ?>
						</a>
					</h2>
				</div>
			</div>

		<?php elseif (is_parent() && is_child()) : ?>

			<div class="featured-image featured-image__subchapter" style="background-image:url(<?php echo $image_url[0]; ?>);">
				<div class="masthead">
					<h3 class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img src="<?php echo get_template_directory_uri(); ?>/img/logo-small.png" alt="Site logo" class="site-logo"><br>
							<?php bloginfo( 'name' ); ?>
						</a>
					</h3>
				</div>
			</div>

		<?php else : ?>

			<div class="featured-image featured-image__article" style="background-image:url(<?php echo $image_url[0]; ?>);">
				<div class="masthead">
					<h3 class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img src="<?php echo get_template_directory_uri(); ?>/img/logo-small.png" alt="Site logo" class="site-logo"><br>
							<?php bloginfo( 'name' ); ?>
						</a>
					</h3>
				</div>
			</div>

		<?php endif; ?>

		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					if ( is_parent() && !is_child() ) {
						get_template_part( 'content', 'chapter' );
					} else if ( is_parent() && is_child() ) {
						get_template_part( 'content', 'subchapter' );
					} else if ( !is_parent() && is_child() ) {
						get_template_part( 'content', 'article' );
					} else if ( is_front_page () ) {
						get_template_part( 'content', 'home' );
					} else {
						get_template_part( 'content', 'page' );
					}

				?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
