<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package acucr
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="to-top"><a href="#top" data-scroll>Back to top</a></div>
		<div class="site-info">
			<div class="site-info__specific">
				<p><strong>If you have any contributions or comments to make about the website, please don’t hesitate to send us an e-mail: <a href="mailto:jeremy.law@canterbury.ac.uk">jeremy.law@canterbury.ac.uk</a></strong></p>
				<p><strong>A Church University Chaplaincy Resource</strong> is run by Rev. Dr. Jeremy Law. It was built by <a href="http://www.nevisonhardy.co.uk"><strong>Nevison Hardy Creative</strong></a> using the <a href="http://www.wordpress.org"><strong>Wordpress</strong></a> platform.</p>
			</div>
			<div class="affiliates">
				<a href="http://www.canterbury.ac.uk"><img src="<?php echo get_template_directory_uri(); ?>/img/cccu-logo.png" alt="Canterbury Christ Church University"></a>
				<a href="https://www.churchofengland.org"><img src="<?php echo get_template_directory_uri(); ?>/img/cofe-logo.png" alt="Church of England"></a>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

<script type="text/javascript">

	smoothScroll.init();

</script>

</html>
