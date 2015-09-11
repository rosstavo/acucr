<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package acucr
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('subchapter'); ?>>
	<header class="entry-header">
		<span class="chapter-name">
			<?php print_page_parents($reverse = true); ?>
		</span>
		<h2>
			<?php 
				$num = get_post_field('menu_order', $post->ID);
				echo $num;
				echo ". ";
			?>
			<?php the_title(); ?>
		</h2>
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

	<ol class="subchapter__article-list article-list">
		<?php
			global $id;
			wp_list_pages("title_li=&child_of=$id&sort_column=menu_order"); ?>
	</ol>

</article><!-- #post-## -->
