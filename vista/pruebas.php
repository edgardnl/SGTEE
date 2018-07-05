<?php
require_once "../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/controlador/MostrarTablaControl.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/TutoresObjeto.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/controlador/EspecialControl.php";

$tabla = new MostrarTablaControl();
$especial = new EspecialControl();


//$objT = new TutoresObjeto();
/*$clave = $_GET['clave'];
$objT = $tabla->mostrarDatosTutorId($clave);
print $objT->clave;
print $objT->nombre."\n";
print $objT->ap_p."\n";
print $objT->ap_m."\n";
print $objT->horaio."\n";
*/
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<style type="text/css" title="currentStyle"> 
            @import "https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css";            
    </style>	
</head>
<body>
	<?php 
    $text = "hola";
    print "Palabra = ".$text;
    $obj = $especial->encriptar($text);
    print "Encriptado = ".$obj;
    $obj1 = $especial->desencriptar("PTwTb32GX8iHaaxjpdfkDA+naGmHFy/vcKiXfyMvTTwig");
    print "Desencriptar = ".$obj1;

    print session_status();
	?>
</body>
</html>