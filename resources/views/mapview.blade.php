<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" >
    <style>
            /* Always set the map height explicitly to define the size of the div
             * element that contains the map. */
            #map {
              height: 100%;
            }
            /* Optional: Makes the sample page fill the window. */
            html, body {
              height: 50vh;
              margin: 0;
              padding: 0;
            }
          </style>
</head>
<body>
<button onclick="getLocation()">Try It</button> 

    @include('maps')   
    <script>
        var x=document.getElementById('lat');
        var y=document.getElementById('lang');

        function getLocation() 
        {
            // alert("hi");
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } 
            else 
            { 
                alert( "Geolocation is not supported by this browser.");
            }
        }

        function showPosition(position) 
        {
            x.innerHTML= position.coords.latitude; 
            y.innerHTML= position.coords.longitude;
        }


        function initMap() 
        {
            // alert(document.getElementById('lat').value);
            // var a =77.38197819999999; 
            // var b =document.getElementById('lng').value; 
            
            var myLatLng = {lat: 37.8136, lng: 144.9631};
    
            var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: myLatLng
            });
        }
        function showPosition(position)
        {
            var latlon = position.coords.latitude + "," + position.coords.longitude;

            var img_url = "https://maps.googleapis.com/maps/api/staticmap?center="+latlon+"&zoom=14&size=400x300&sensor=false&key=AIzaSyAoIp8pMT0rE9etAxkfOb-UPQAID9Ec3WA";

            document.getElementById("mapholder").innerHTML = "<img src='"+img_url+"'>";
            myLatLng = { lat:position.coords.latitude, lng:position.coords.longitude };
            var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Hello World!'
            });
        }
            
        }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAoIp8pMT0rE9etAxkfOb-UPQAID9Ec3WA&callback=initMap">
    </script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>
</html>