jQuery(document).ready(function($) {
  /***************** CAROUSEL ******************/
  $('#testimonial-carrousel').owlCarousel({
    autoPlay: 5000,
    slideSpeed : 300,
    paginationSpeed : 400,
    singleItem:true,
    theme: ''
  });

  /***************** INCREMENT NUMBERS ******************/
  $('#section-achievements').waypoint(function() {
    $('.count').each(function () {
      var $this = $(this);
      jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
        duration: 3000,
        easing: 'swing',
        step: function () {
          $this.text(Math.ceil(this.Counter));
        }
      });
      $(this).removeClass('count');
    });
  }, {
    offset: '90%'
  });
});