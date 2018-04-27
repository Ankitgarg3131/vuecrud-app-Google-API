<!DOCTYPE html>
<html>
  <head>
    <title>Geolocation</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">    
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 50%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 90%;
        margin: 0;
        padding: 10ex;
      }
    </style>
    
    <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script>
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
    </script>
  </head>
  <body>

    
    <div id="map"></div>
    {{-- <p id="lat"></p> --}}
    <div id="demo">
        <button class="changecontent" type="button">Change Content</button>
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
            console.log("hello2");
            
            var latval=JSON.parse(position.coords.latitude);
            var lngval=JSON.parse(position.coords.longitude);
             myLatLng = new google.maps.LatLng(latval,lngval);
             
             
            createMap(myLatLng);
            myLatLng = {
              lat:position.coords.latitude,
              lng:position.coords.longitude
            };
           
           // nearbySearch(myLatLng);
           searchOnMap(latval,lngval);
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
          function createMarker(latlng)
          {
            var marker = new google.maps.Marker
            ({
              position:latlng,
              map:map,
              
            });
          }

          // SHOW NEAR BY SEARCH===ON GOOGLE LOCATION======
        //   function nearbySearch(myLatLng)
        //   {
            
        //         var request ={
        //         location:myLatLng,
        //         radius:'2500',
        //         types:['school']
        //       };
        //       var service = new google.maps.places.PlacesService(map);
        //       service.nearbySearch(request,callback);
        //       function callback(results, status)
        //       {
        //         if(status === google.maps.places.PlacesServiceStatus.OK)
        //         {
        //           for(var i = 0; i < results.length;i++)
        //           {
        //             var place = results[i];
                  
        //               latlng = place.geometry.location;
        //               icn = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
        //               name = place.name;
        //               createMarker(latlng,icn,name); 
        //           }
        //         }
        //       }
        //   }
          // $('.changecontent').on('click',function(){
          //   alert('button clicked');
          //   $.post("showMapingdata",function(data, status){
          //     alert(data);
          //   });
          // });

          function searchOnMap(lat,lng)
          {
             
             $.post("/showDataMap",{'lat':lat,'lng':lng},function(match){
              console.log(match);
                $.each(match,function (i,val) { 
                 
                  var  glatval=val.latitude;
                  var glngval=val.longitude;
                 
                  var gLatLng = new google.maps.LatLng(glatval,glngval);
                createMarker(gLatLng);
                })
             });
           

          
          }
         }); 

          
          
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAoIp8pMT0rE9etAxkfOb-UPQAID9Ec3WA&libraries=places">
    </script>
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAoIp8pMT0rE9etAxkfOb-UPQAID9Ec3WA" async defer> --}}
  </body>
</html>