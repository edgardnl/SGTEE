<?php

require_once "../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/CoordinadorBo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/AlumnosObjetoCoordinador1.php";

$bo = new ModuloCoordinador1();
#$action = "editarTutor";
switch ($_REQUEST['action']) {#$_REQUEST['action']
    case 'EditarCoordinador':
        $obj = new AlumnosObjetoCoordinador1();
        $obj->id_relacion= $_POST['id_relacion'];
        $obj->id_alumno= $_POST['id_alumno'];
        $obj->id_tutor= $_POST['id_tutor'];
        $obj->aprobacion= $_POST['aprobacion'];
        $obj->observacion= $_POST['observacion'];
        $obj->estatuss= $_POST['estatus'];
        $res = $bo->editaDatosCoordinador($obj);

        print $res;

    break;
}
