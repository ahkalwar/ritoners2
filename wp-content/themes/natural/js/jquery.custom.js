(function($) {

  function removeNoJsClass() {
    $('html:first').removeClass('no-js');
  }

  /* Superfish the menu drops ---------------------*/
  function superfishSetup() {
    $('#navigation').find('.menu').superfish({
      delay: 200,
      animation: {opacity:'show', height:'show'},
      speed: 'fast',
      cssArrows: true,
      autoArrows:  true,
      dropShadows: false
    });
  }

  /* Flexslider ---------------------*/
  function flexSliderSetup() {

    if( ($).flexslider) {
      var slider = $('.flexslider');
      slider.flexslider({
        slideshowSpeed: 12000,
        animationDuration: 600,
        animation: 'fade',
        video: false,
        useCSS: false,
        prevText: '<i class="fa fa-angle-left"></i>',
        nextText: '<i class="fa fa-angle-right"></i>',
        touch: false,
        animationLoop: true,
        smoothHeight: true,
        controlsContainer: '.slideshow',
        controlNav: true,
        manualControls: '.flex-control-nav li',

        start: function(slider) {
          slider.removeClass('loading');
          $('.preloader').hide();
          $('.flexslider').resize();
        }
      });
    }

  }

  /* Portfolio Filter ---------------------*/
  function isotopeSetup() {
    var mycontainer = $('#portfolio-list');
    mycontainer.isotope({
      itemSelector: '.portfolio-item'
    });

    // filter items when filter link is clicked
    $('#portfolio-filter a').click(function() {
      var selector = $(this).attr('data-filter');
      mycontainer.isotope({ filter: selector });
      return false;
    });
  }

  /* Size Featured Image To Content ---------------------*/
  function matchHeight() {
    var maxHeight = -1;

    $('.featured-posts .holder').each(function() {
      maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
    });

    $('.featured-posts .feature-img').each(function() {
      $(this).height(maxHeight);
    });
  }

  function modifyPosts() {

    /* Hide Comments When No Comments Activated ---------------------*/
    $('.nocomments').parent().css('display', 'none');

    /* Animate Page Scroll ---------------------*/
    $(".scroll").click(function(event) {
      event.preventDefault();
      $('html,body').animate({scrollTop:$(this.hash).offset().top}, 500);
    });

  }

  $( document )
    .ready( removeNoJsClass )
    .ready( superfishSetup )
    .ready( matchHeight )
    .ready( modifyPosts )
    .on( 'post-load', modifyPosts );

  $( window )
    .load( flexSliderSetup )
    .load( isotopeSetup )
    .resize( matchHeight )
    .resize( isotopeSetup );

})( jQuery );
