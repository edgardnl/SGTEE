<?php
require_once "../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/controlador/MostrarTablaControl.php";
$tabla = new MostrarTablaControl();

if (isset($_POST['btn'])) {
    $tabla->direccionLogin($_POST['user'],$_POST['passw']);
}
?>
<html>
    <head>
        <script src="jquery/jquery.min.js"></script>
        <!--<script src="js/acceso.js"></script>-->
        <script>
            $('#login').after('<h1>Usuario Incorrecto</h1>');
        </script>
    </head>
    <body>
        <form name="login" id="login" method="post">
            Matricula: <input name="user">
            Contraseña: <input name="passw">
            <button name="btn" onclick="ingresar()">Ingresar</button>
        </form>
    </body>
</html>
