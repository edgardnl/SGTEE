<?php

require_once "../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/AlumnosBo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/AlumnosObjeto.php";

$bo = new ModuloAlumnos();
//$action = "editarTutor";
switch ($_REQUEST['action']) {#$_REQUEST['action']
    case 'eliminarAlumno':
        $obj = new AlumnosObjeto();
        $obj->id = $_POST['id_alumno'];#                
        $res = $bo->eliminaDatosAlumnos($obj);
        print $res;
        break;
}
