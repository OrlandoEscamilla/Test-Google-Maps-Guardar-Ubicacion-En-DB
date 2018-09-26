<?php
   include_once('conexion.php');

   if(isset($_POST['latitude']) && isset($_POST['longitude'])){



        $latitud = $_POST['latitude'];
        $longitud = $_POST['longitude'];
        

        
         $sql = "INSERT INTO lugar(latitud , longitud) VALUES('$latitud','$longitud')";
         $respuesta = $conexion->query($sql);
         

        echo 1;

   }



?>