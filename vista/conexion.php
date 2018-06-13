<?php
      $host="localhost";
      $usuario="root";
      $contra="";
      $db="practica1";//practica1
      //Cambiar datos dependiendo la base de datos que tengamos

      //Establecer la conexion
      $testconec = mysqli_connect($host,$usuario,$contra,$db) or die ("No se puede conectar");
      mysqli_select_db($testconec,$db) or die ("No se encuentra la base de datos especificada");
?>