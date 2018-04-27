<!DOCTYPE html>
<html>
  <head>
    <title>Geolocation</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 50%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  </head>
  <body>
    <div id="map"></div>
    {{-- <p id="lat"></p> --}}
    
    <script>
      var map;
      var myLatLng;
     $(document).ready(function()
     {
      initMap();

        //===== GETS GEO LOCATION=====
          function initMap()
          {
            if(navigator.geolocation)
            {
              navigator.geolocation.getCurrentPosition(success, fail);
            }
            else{
              alert("browser not supported");
            }
          }


          // === CALL SUCCESS FUNCTION====
          function success(position)
          {
            var latval=position.coords.latitude;
            var lngval=position.coords.longitude;
            console.log(latval);
            console.log(lngval);
            
             myLatLng = new google.maps.LatLng(latval,lngval);
            createMap(myLatLng);
            myLatLng = {
              lat:position.coords.latitude,
              lng:position.coords.longitude
            };
            nearbySearch(myLatLng);
            }


         
         
         
          //==== CALL FAIL FUNCTION====
          function fail()
          {
            alert("function fail");
          }


          //==== CREATE MAP =====
          function createMap(myLatLng)
          {
            map = new google.maps.Map(document.getElementById('map'),
            {
              center:myLatLng,
              zoom:14
            });

            var marker = new google.maps.Marker({

                position:myLatLng,
                map:map,
               
            })
          }
        
         
          
          //create marker ON MAP======
          function createMarker(latlng,icn,name)
          {
            var marker = new google.maps.Marker
            ({
              position:latlng,
              map:map,
              icon:icn,
              title:name
            });
          }

          // SHOW NEAR BY SEARCH===ON GOOGLE LOCATION======
          function nearbySearch(myLatLng)
          {
            
                var request ={
                location:myLatLng,
                radius:'2500',
                types:['school']
              };
              var service = new google.maps.places.PlacesService(map);
              service.nearbySearch(request,callback);
              function callback(results, status)
              {
                if(status === google.maps.places.PlacesServiceStatus.OK)
                {
                  for(var i = 0; i < results.length;i++)
                  {
                    var place = results[i];
                  
                      latlng = place.geometry.location;
                      icn = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
                      name = place.name;
                      createMarker(latlng,icn,name); 
                  }
                }
              }
          }
          
          
     });
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAoIp8pMT0rE9etAxkfOb-UPQAID9Ec3WA&libraries=places">
    </script>
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAoIp8pMT0rE9etAxkfOb-UPQAID9Ec3WA" async defer> --}}
  </body>
</html>