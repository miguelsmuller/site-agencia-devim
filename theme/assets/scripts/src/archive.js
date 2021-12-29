/*global common_params:false*/
jQuery(document).ready(function($) {
  /***************** MASONRY ******************/
  var $container = $('#article-list');
  $container.imagesLoaded( function() {
    $container.masonry({
      itemSelector: '.article-item',
      isAnimated: true,
      animationOptions: {
        duration: 300,
        easing: 'linear'
      }
    });
  });

  /***************** LOAD MORE ******************/
  var paged = 2;
  $( '#load-more' ).click(function() {
    var template = $(this).attr('data-template');
    var post_type = $(this).attr('data-post-type');
    var posts_per_page = $(this).attr('data-posts-per-page');
    var data_max_page = $(this).attr('data-max-page');

    if (paged > data_max_page){
      return false;
    }else{
      loadArticle(template, post_type, posts_per_page, paged);
    }
    paged++;
  });

  function loadArticle(template, post_type, posts_per_page, paged) {
    $( '#load-more' ).html('Carregando...');
    $.ajax({
      url: common_params.site_url + '/wp-admin/admin-ajax.php',
      type:'POST',
      data: 'action=infinite_scroll&template='+ template + '&post_type='+ post_type + '&posts_per_page=' + posts_per_page +'&paged='+ paged,
      success: function(data){
        $('#article-list').append(data);

        $container.imagesLoaded( function() {
          $container.masonry('reload');
        });

        $( '#load-more' ).html('Carregar mais artigos');

      }
    });
    return false;
  }
});

