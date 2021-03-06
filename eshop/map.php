<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwbktBM3GY5GfsT0VfA1MGEobYqkvrSkc&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <script>
      function initMap() {

        var map = new google.maps.Map( 
            document.getElementById("map"), {
            center: { lat: 57.397, lng: 36.644 },
            zoom: 8,
        });

        var marker = new google.maps.Marker({position: { lat: 56.397, lng: 36.644 }, map:map});
        var marker1 = new google.maps.Marker({position: { lat: 56.5, lng: 36.5 }, map:map});

      }
    </script>
  </head>
  <body>
    <div id="map"></div>
  </body>
</html>