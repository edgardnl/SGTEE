<?php
require_once "../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/controlador/MostrarTablaControl.php";
$tabla = new MostrarTablaControl();

if (isset($_POST['btn'])) {
    $tabla->direccionLogin($_POST['user'], $_POST['passw']);
}
?>
<html>
    <head>
        <script src="jquery/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC" rel="stylesheet"> 
        <!--<script src="js/acceso.js"></script>-->
        
    </head>
    <body>
        <div class="form">
            <form name="login" id="login" method="post">
                <h1>SGTE</h1>
                <h4>Sistema de Gestion de Tutorias Especiales</h4>
                <div>Matricula:</div>
                <div><input name="user"></div>
                <div>Contraseña:</div>
                <div><input name="passw" type="password"></div>
                <div><button name="btn" onclick="ingresar()">Ingresar</button></div>
            </form>
        </div>
    </body>
</html>
