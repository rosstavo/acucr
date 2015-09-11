<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package acucr
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('chapter'); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'acucr' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<ul class="chapter__subchapter-list post-list">
	<?php
		$child_pages = $wpdb->get_results("SELECT *    FROM $wpdb->posts WHERE post_parent = ".$post->ID."    AND post_type = 'page' ORDER BY menu_order", 'OBJECT');    ?>
		<?php if ( $child_pages ) : foreach ( $child_pages as $pageChild ) : setup_postdata( $pageChild ); ?>
			<li>
				<a href="<?php echo  get_permalink($pageChild->ID); ?>" rel="bookmark" title="<?php echo $pageChild->post_title; ?>">
			    	<div class="post-link__key">
			    		<div class="thumb-overlay"></div>
						<?php echo get_the_post_thumbnail($pageChild->ID, 'thumbnail'); ?>
						<h2>
							<?php
								$num = get_post_field('menu_order', $pageChild->ID);
								echo $num;
								echo (". ");
							?>
							<?php echo $pageChild->post_title; ?>
						</h2>
			        </div>
			    </a>
			</li>
		<?php endforeach; endif;
	?>
	</ul>

</article><!-- #post-## -->
