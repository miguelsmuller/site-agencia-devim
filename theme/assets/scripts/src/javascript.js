/*global hljs:false, Clipboard:false */

jQuery(document).ready(function($) {
	/***************** MODAL NEWSLERTTER ******************/
	function windowPopup(url, width, height) {
		// Calculate the position of the popup so
		// it’s centered on the screen.
		var left = (screen.width / 2) - (width / 2),
			top = (screen.height / 2) - (height / 2);

		window.open(
		url,
		'',
		'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,width=' + width + ',height=' + height + ',top=' + top + ',left=' + left
		);
	}

	$('.btn-social').on('click', function(e) {
		e.preventDefault();

		windowPopup($(this).attr('href'), 500, 300);
	});

	/***************** MODAL NEWSLERTTER ******************/
	if ($('.btn-copy').length){
		new Clipboard('.btn-copy');
	}

  /***************** MODAL NEWSLERTTER ******************/
  if ($('.snippet-see-more').length){
    $('.snippet-see-more').on('click', function(e) {
      e.preventDefault();

      $(this).prev().children().css( 'max-height', 'none' ).css( 'overflow-x', 'auto' );

      $(this).css('display', 'none');
    });
  }

	/***************** MODAL NEWSLERTTER ******************/
	if ($('#gallery').length){
		$('#gallery').lightGallery();
	}

	/***************** PREVENT DEFAULT CLICK ON # ******************/
	$('[href="#"]').click(function(e){
		e.preventDefault();
	});

	/***************** FIXED NAVBAR ******************/
	$('#navbar-main').fixedNavBar({
		'elementSpace' : '#section-hero',
		'duration'     : '0',
		'animated'     : false
	});

  /***************** PARTICLEGROUND ******************/
  if ($('#section-hero').length){
     $('#section-hero').particleground({
      dotColor: '#f1f1f1',
      lineColor: '#f1f1f1',
      density: '9000',
      particleRadius: '8',
      parallax: false,
      maxSpeedY: '0.6',
      maxSpeedX: '0.6'
    });

    $('.animeSlideInDown').waypoint(function() {
      //$('.animeSlideInDown').addClass('animated slideInDown');
      $('.animeSlideInDown').attr('class', 'animated slideInDown');
    }, { offset: '80%' });

    $('.animeFadeInLeft').waypoint(function() {
      //$('.animeFadeInLeft').addClass('animated fadeInLeft');
      $('.animeFadeInLeft').attr('class', 'animated fadeInLeft');
    }, { offset: '80%' });

    $('.animeFadeInRight').waypoint(function() {
      //$('.animeFadeInRight').addClass('animated fadeInRight');
      $('.animeFadeInRight').attr('class', 'animated fadeInRight');
    }, { offset: '80%' });

    $('.animeFlipInY').waypoint(function() {
      //$('.animeFlipInY').addClass('animated flipInY');
      $('.animeFlipInY').attr('class', 'animated flipInY');
    }, { offset: '80%' });

    $('.animeFlipInX').waypoint(function() {
      //$('.animeFlipInX').addClass('animated flipInX');
      $('.animeFlipInX').attr('class', 'animated flipInX');
    }, { offset: '80%' });
  }

  /***************** HIGHLIGHT ******************/
  if ($('pre code').length){
    $('pre code').each(function(i, block) {
      hljs.highlightBlock(block);
    });
  }

  /***************** AFFIX BUTTON GO TO ******************/
  if ($('.button-go-to').length){
    $('.button-go-to').affix({
      offset: {
        top: function () {
          return 145;
        },
        bottom: function () {
          var bottomAffix = parseInt( $('#footer-contact').outerHeight(true), 10 ) +
                        parseInt( $('#footer-copyright').outerHeight(true), 10 );
          return bottomAffix;
        }
      }
    });
  }

  /***************** AFFIX SIDEBAR ******************/
  if ($('#affix-sidebar').length){
    var heightSidebar = parseInt($('#affix-sidebar').outerHeight(true), 10);
    var heightWindow = parseInt( $(window).outerHeight(true), 10 );
    var heightNavBar = parseInt( $('#navbar-main').outerHeight(true), 10 );

    var widthSidebar = parseInt( $('#affix-sidebar').width(), 10 );

    var heightUtil = heightWindow - heightNavBar;

    $('#affix-sidebar').affix({
      offset: {
        top: function () {
          var topAffix = heightSidebar - heightWindow + heightNavBar ;

          return topAffix;
        },
        bottom: function () {
          var bottomAffix = parseInt( $('#footer-contact').outerHeight(true), 10 ) +
                        parseInt( $('#footer-copyright').outerHeight(true), 10 );
          return bottomAffix;
        }
      }
    });

    $('#affix-sidebar').on('affixed.bs.affix', function () {
      $('#affix-sidebar').css('width', widthSidebar);
      if (heightSidebar > heightUtil){
        $('#affix-sidebar').css('bottom', '0');
      }else{
        $('#affix-sidebar').css('top', '110');
      }
    });
  }

  /**
   * SMOOTH SCROLLING
   */
  $('a[href*=#]:not([href=#]):not([data-toggle="tab"])').click(function() {
    if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        var $padding = parseInt($(this).attr('data-padding'), 10);
        $padding = (($padding >= 1) ? $padding : 0);
        $('html,body').animate({
          scrollTop: target.offset().top - $padding
        }, 1000);
        return false;
      }
    }
  });
});


/**
 * PLUGIN FIXED NAVBAR ON TOP
 */
jQuery.fn.fixedNavBar = function(options) {

  var defaults = {
    'elementSpace' : '',
    'fixedClass'   : 'navbar-fixed',
    'duration'     : '800'
  };

  var settings = jQuery.extend( {}, defaults, options );

  return this.each (function() {

    // AVOID PROBLEM IN VARIABLE SCOPE
    var $target = jQuery(this);

    // CALCULATING THE HEIGHT TO SHOW MENU
    var $showAfter = 0;

    if ( jQuery(settings.elementSpace).length ){
      var $elementSpaceHeight = parseInt(jQuery(settings.elementSpace).css('height'), 10);
      $showAfter = $elementSpaceHeight + $showAfter;
    }


    // ADD OR REMOVE CLASS DEPENDING ON THE SCROLL POSITION
    if ( jQuery(settings.elementSpace).length ){
      jQuery(window).scroll(function(){
        var $positionOfTop = jQuery(this).scrollTop();
        if ($positionOfTop > $showAfter){
          if ( !jQuery($target).hasClass(settings.fixedClass) ){
            jQuery('body').css('padding-top', '80px');
            jQuery($target).stop();
            jQuery($target).addClass(settings.fixedClass);
            jQuery($target).css('top', '0px');
          }
        }
        else{
          jQuery('body').css('padding-top', '0px');
          $target.removeClass( settings.fixedClass );
        }
      });
    } else {
      jQuery($target).addClass(settings.fixedClass);
      jQuery('body').css('padding-top', '80px');
      return true;
    }
  });
};
