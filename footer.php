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

</div><!-- #page -->
<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="to-top"><a href="#top" data-scroll>Back to top</a></div>
	<div class="site-info">
		<div class="affiliates">
			<a href="http://www.canterbury.ac.uk"><img src="<?php echo get_template_directory_uri(); ?>/img/cccu-logo.png" alt="Canterbury Christ Church University"></a>
			<a href="https://www.churchofengland.org"><img src="<?php echo get_template_directory_uri(); ?>/img/cofe-logo.png" alt="Church of England"></a>
		</div>
		<div class="site-info__specific">
			<p><strong>If you have any contributions or comments to make about the website, please don’t hesitate to send us an e-mail: <a href="mailto:jeremy.law@canterbury.ac.uk">jeremy.law@canterbury.ac.uk</a></strong></p>
		</div>
	</div><!-- .site-info -->
</footer><!-- #colophon -->


<?php wp_footer(); ?>

</body>

<script type="text/javascript">

	$(window).on("load resize", function() {
		// $("body").css("height", $(document).height());
	});

	smoothScroll.init();

</script>

</html>
