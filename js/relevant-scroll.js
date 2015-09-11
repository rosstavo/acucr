// Fixes the subchapter list on the article pages.
// Based on code from Relevant Magazine.

jQuery(document).ready(function() {
  
	jQuery(window).scroll(function() {

		var el = jQuery('.entry-content .subchapter-index');

		if (el.length > 0) {
		  
			var elTop = jQuery('.entry-content').offset().top;
			var elBottom = elTop + jQuery('.entry-content').height() - el.height() - 200;

			if (window.scrollY + 200 > elTop) {
				if (window.scrollY > elBottom) {
					el.css('top', jQuery('.entry-content').height() - el.height()).removeClass("is-faded");
				}
				else {
					el.css('top', window.scrollY - elTop + 200).addClass("is-faded");;
				}
			}
			else {
				el.css('top', 0).removeClass("is-faded");
			}
		}

	});

});;