<?php

require_once "../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/TutoresBo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/TutoresObjeto.php";

$bo = new ModuloTutores();
//$action = "editarTutor";
switch ($_REQUEST['action']) {#$_REQUEST['action']
    case 'editarTutor':
        $obj = new TutoresObjeto();
        $obj->id = $_POST['id'];#
        $obj->clave = $_POST['clav'];
        $obj->nombre = $_POST['nom'];
        $obj->ap_p = $_POST['apa'];
        $obj->ap_m = $_POST['ama'];
        $obj->asignatura = $_POST['asig'];
        $obj->horaio = $_POST['hori'];
        /*$obj->id = 9;#
        $obj->clave = "4545";
        $obj->nombre = "fsfs";
        $obj->ap_p = "fsfs";
        $obj->ap_m = "fsfs";
        $obj->asignatura = "fsfs";
        $obj->horaio = "fsfs";*/
        //$obj->correo = $_POST['correo'];
        $res = $bo->editaDatosTutor($obj);
        print $res;
        break;
}
