<?php
 $host="localhost";
      $usuario="root";
      $contra="";
      $db="sgtee";
      $testconec = mysqli_connect($host,$usuario,$contra,$db) or die ("No se puede conectar");
      mysqli_select_db($testconec,$db) or die ("No se encuentra la base de datos especificada");



$id=$_GET['id'];

  $sql= "DELETE FROM relacion_alumno_tutor where id_relacion = $id";

  if (mysqli_query($testconec,$sql)==TRUE) {
      header("Location:Coordinadora1_relacion.php");

    # code...
  }else{
    header("Location:Coordinadora1_relacion.php");
  }



?>