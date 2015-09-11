<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package acucr
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
	<header class="entry-header">
		<h3 class="breadcrumbs">
			<a href="<?php echo get_permalink($post->post_parent); ?>">
				<?php
					$num = get_post_field('menu_order', $post->post_parent);
					if( count(get_post_ancestors($post->ID)) >= 2 ) {
						echo $num;
						echo ". ";
					}
				?>
				<?php echo get_the_title( $post->post_parent ); ?>
			</a>
		</h3>
		<h2 class="page-number">
			<?php
				$num = get_post_field('menu_order', $post->ID);
				if( count(get_post_ancestors($post->ID)) >= 2 ) {
					echo romanNumerals($num);
				} else {
					echo $num;
				}
			?>.
		</h2>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<ol class="subchapter-index" <?php if( count(get_post_ancestors($post->ID)) >= 2 ) echo 'style="list-style-type: lower-roman;"';  ?>>
			<?php
			wp_list_pages('title_li=&child_of='.$post->post_parent.'&link_before=<span>&link_after=</span>'); ?>
		</ol>

		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'acucr' ),
				'after'  => '</div>',
			) );
		?>

		<?php
		$nextPage = next_page_not_post();
		if(!empty($nextPage)) : ?>

			<div class="next-article">
				<span class="next-article__label">Next article</span>
				<span class="next-article__link"><?php echo next_page_not_post('%title'); ?><span class="arrow">&#10140;</span></span>
			</div>

		<?php endif; ?>

	</div><!-- .entry-content -->

	<div class="entry-content">
		<?php

		$posts = get_field('related_articles');

		if( $posts ): ?>
			<div class="post-list__small">
				<h3 class="logo-heading">Related articles</h3>
			    <ul>
			    <?php foreach( $posts as $post): ?>
			        <?php setup_postdata($post); ?>
			        <li>
						<?php the_post_thumbnail('thumbnail') ?>
						<span class="chapter-name__small">
							<?php
								echo get_the_title( $post->post_parent );
							?>
						</span>
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>

			        </li>
			    <?php endforeach; ?>
			    </ul>
			</div>
		    <?php wp_reset_postdata(); ?>
		<?php endif; ?>

	</div>

</article><!-- #post-## -->
