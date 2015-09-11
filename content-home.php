<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package acucr
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('home'); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_field('headline'); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<p class="lead"><?php the_field('intro_paragraph'); ?></p>
	</div><!-- .entry-content -->

	<div class="article-highlight">
		<h2>Not sure where to start?</h2>
		<p class="lead">Try one of these pages:</p>
		<?php 

		$posts = get_field('article_highlight');

		if( $posts ): ?>
		    <ul class="post-list">
		    <?php foreach( $posts as $post): ?>
		        <?php setup_postdata($post); ?>
		        <li>
		        	<a href="<?php the_permalink(); ?>">
			        	<div class="post-link__key">
			        		<div class="thumb-overlay"></div>
							<?php the_post_thumbnail('thumbnail') ?>
							<span class="chapter-name">
								<?php print_page_parents($reverse = true); ?>
							</span>
							<h2>
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
							</h2>
			            </div>
		            </a>
		        </li>
		    <?php endforeach; ?>
		    </ul>
		    <?php wp_reset_postdata(); ?>
		<?php endif; ?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
