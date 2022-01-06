<!DOCTYPE html >
  <head>
    
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    
    <title>gps tracker</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>

<html>
  <body>
 
    <div id="map"></div>

    <script>
      var bb = [] ;
        $.get("http://localhost/maps/get_location.php", function(response) {
          console.log("get location");
          console.log(response);
          console.log(response[0].lat);
          console.log(response[0].lng);
          aa = new google.maps.LatLng(response[0].lat,response[0].lng);
          aa1 = new google.maps.LatLng(response[1].lat,response[1].lng);

          

          $.each(response, function(i,d) {
          console.log(d.time);
          console.log(d.lat);
          console.log(d.lng);
    
          bb[i] = new google.maps.LatLng(parseFloat(d.lat), parseFloat(d.lng));

          });
          console.log(bb);
          
            
   
// your script
        });


        function initMap() {
          var map = new google.maps.Map(document.getElementById('map'), {
            center: new google.maps.LatLng(8.461170, 99.858925),
            zoom: 15
          });
          
          var infoWindow = new google.maps.InfoWindow;
            downloadUrl('http://localhost/maps/xml.php', function(data) {
              var xml = data.responseXML;
              var markers = xml.documentElement.getElementsByTagName('marker');
              $.each(bb,function(i,d){
              //Array.prototype.forEach.call(markers, function(markerElem) {
                //var id = markerElem.getAttribute('id');
                //var name = markerElem.getAttribute('name');
                //var address = markerElem.getAttribute('address');
                //var type = markerElem.getAttribute('type');
                //var point = new google.maps.LatLng(
                   // parseFloat(markerElem.getAttribute('lat')),
                   // parseFloat(markerElem.getAttribute('lng')));
              //var aa  =new google.maps.LatLng($lat, $lng);
                
               
                
                var marker = new google.maps.Marker({
                  map: map,
                  position: d,
                });
                
                //console.log(point);
                
              });
            });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
      
    </script>
<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCO_0P33j5Cu3TcVG1yqGxgDcnNdDrFgLc&callback=initMap"
      defer
    ></script>
    
  </body>
</html>