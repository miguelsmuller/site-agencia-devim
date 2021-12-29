/*global google:false, ga:false, common_params:false*/
function initialize() {
  /***************** DEFINE MAP STYLE ******************/
  var mapStyle = [
    {
      'featureType': 'all',
      'elementType': 'all',
      'stylers': [
        {
          'saturation': '-100'
        },
        {
          'lightness': '41'
        }
      ]
    }
  ];

  /***************** DEFINE MAP OPTIONS ******************/
  var mapOptions = {
    styles: mapStyle,
    zoom: 16,
    scrollwheel: false,
    mapTypeControl: false,
    streetViewControl: false,
    center: new google.maps.LatLng(-22.725351, -44.135198),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };


  /***************** ADD OPTION TO MAP ******************/
  var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);


  /***************** CREATE A MARKER ******************/
  var iconMarker = common_params.site_url + '/wp-content/themes/devim-theme/assets/images/page-contact/icon-marker.png';
  var marker = new google.maps.Marker({
    position: new google.maps.LatLng(-22.725351, -44.135198),
    title: 'Devim',
    icon: iconMarker
  });
  marker.setMap(map);
}

initialize();

jQuery(document).ready(function($) {
  $('#contact-form').submit(function(){
    ga('send', 'event', 'Formulário', 'Envio', 'Formulário de contato');
  });
});