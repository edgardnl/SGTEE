<?php

require_once "../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/AlumnosBo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/AlumnosObjeto.php";

$bo = new ModuloAlumnos();
//$action = "editarTutor";
switch ($_REQUEST['action']) {#$_REQUEST['action']
    case 'editarAlumnos':
        $obj = new AlumnosObjeto();
        $obj->id = $_POST['id_alumno'];#
        $obj->matricula = $_POST['matricula'];
        $obj->nombre = $_POST['nombre'];
        $obj->ap_p = $_POST['ap_p'];
        $obj->ap_m = $_POST['ap_m'];
        $obj->grupo= $_POST['grupo'];
        $obj->carrera= $_POST['carrera'];
        $obj->telefono= $_POST['telefono'];#
        $obj->telefono_cel = $_POST['telefono_cel'];
        $obj->semestre= $_POST['semestre'];
        $obj->correo= $_POST['correo'];
        $obj->sexo= $_POST['sexo'];
        $res = $bo->editaDatosAlumnos($obj);
        print $res;
        break;
}












