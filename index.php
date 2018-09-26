<!--
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Prueba google maps</title>
  </head>
  <body>
    <button type="button" name="button" onclick="findMe()">Geolocalizacion</button>
    <div id="map" style="width:500px; height:500px;"></div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmiG3liPZ6NmHhPJdc0nOxSmhnH_5wpQM"></script>

    <script type="text/javascript">

    function findMe(){
      var output = document.getElementById('map');

      if (navigator.geolocation){
          output.innerHTML = "<p> Tu navegador soporta Geolocalizacion";
      }else{
        output.innerHTML = "<p>Tu navegador no soporta Geolocalizacion";
      }

      function localizacion(posicion){
        var latitude = posicion.coords.latitude;
        var longitude = posicion.coords.longitude;

        output.innerHTML = "<p>latitud: "+latitude+"<br>Longitud: "+longitude+"</p>";
      }

      function error(){
        output.innerHTML = "<p>No se pudo obtener tu ubicacion</p>";
      }

      navigator.geolocation.getCurrentPosition(localizacion, error);
    }

/*
        var  mapa;
        google.maps.event.addDomListener(window,'load',dibujarMapa);
        function dibujarMapa(){
           var opcionesMapa = {
             zoom: 15,
             mapTypeId: google.maps.MapTypeId.ROADMAP
           }
           mapa = new google.maps.Map(document.getElementById('google_canvas'),opcionesMapa);
           navigator.geolocation.getCurrentPosition(function(posicion){
             var geolocalizacion = new google.maps.LatLng(posicion.coords.latitude, posicion.coords.longitude);
             mapa.setCenter(geolocalizacion);
           )};
        }

  */

    </script>

  </body>
</html>





-->

<!DOCTYPE html>
<html>
  <head>

    <style>
      #map {
        height: 400px;
        width: 100%;
       }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  <body onload="findMe()">
    <h3>My Google Maps Demo</h3>
    <div id="map"></div>
    <script>
      function initMap(posicion) {
        var latitude = posicion.coords.latitude;
        var longitude = posicion.coords.longitude;



       // var uluru = {"lat": latitude, "lng": longitude};

    


        $.ajax({
            url: 'recibir.php', // Url to which the request is send
            type: 'POST',             // Type of request to be send, called as method
            data: ('latitude='+latitude+'&longitude='+longitude), // Data sent to server, a set of key/value pairs (i.e. form 
            success: function(data)   // A function to be called if request succeeds
            {
                //alert(data);
                if(data == 1){                   
                       $("#map").html('se an pasado tus datos');
                    }else{

                        $("#map").html('NO se an pasado tus datos');
                        
                    }
            }
        });


      /*

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
        */
      }


      function findMe(){
        var output = document.getElementById('map');

        if (navigator.geolocation){
            output.innerHTML = "<p> Tu navegador soporta Geolocalizacion";
        }else{
          output.innerHTML = "<p>Tu navegador no soporta Geolocalizacion";
        }



        function error(){
          output.innerHTML = "<p>No se pudo obtener tu ubicacion</p>";
        }

        navigator.geolocation.getCurrentPosition(initMap, error);
      }

    </script>

 
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmiG3liPZ6NmHhPJdc0nOxSmhnH_5wpQM">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </body>
</html>
