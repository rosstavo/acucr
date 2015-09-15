( function( $ ){

  var showNav = $('#nav-reveal');
  var siteNav = $('#site-navigation');
  var pageNav = $('#pagenav');
  var scrollArrow = $('#scroll')
  var page = $('#page')
  var footer = $('#colophon')

  $(document).ready(function(){
    if(page.height() > pageNav.height()) {
      scrollArrow.css('display', 'none');
    } else {
      siteNav.scroll(function(){
        if($(this).scrollTop() > 0) {
          scrollArrow.fadeOut(500);
        } else {
          scrollArrow.fadeIn(500);
        }
      });
    }
  });

  $(window).scroll(function(){
    if($(this).scrollTop() > 0 && $(this).width() > 1100) {
      siteNav.addClass('is-faded');
    } else {
      siteNav.removeClass('is-faded');
    };
  });

  showNav.click(function(){
    siteNav.toggleClass('is-open');
    scrollArrow.toggleClass('is-open');
    page.toggleClass('nav-open');
    footer.toggleClass('nav-open');
    $(this).toggleClass('nav-open');
  });

  $(window).on("load resize", function() {
    if($(this).width() > 1100) {
      siteNav.removeClass('is-open');
      scrollArrow.removeClass('is-open');
      page.removeClass('nav-open');
      footer.removeClass('nav-open');
      showNav.removeClass('nav-open');
    }
  });

})(jQuery);
