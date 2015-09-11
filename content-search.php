<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package acucr
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_post_thumbnail('thumbnail') ?>
	<header class="entry-header">
		<h3>
			<?php print_page_parents($reverse = true); ?>
		</h3>
		<h2 class="entry-title">
			<a href="<?php the_permalink(); ?>">
				<?php
					if ( is_child() ) {
						$num = get_post_field('menu_order', $post->ID);
						if ( count(get_post_ancestors($post->ID)) >= 2 ) {
							echo romanNumerals($num);
							echo (". ");
						} else {
							echo $num;
							echo (". ");
						}
					}
				?>
				<?php the_title(); ?>
			</a>
		</h2>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

</article><!-- #post-## -->
