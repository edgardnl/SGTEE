<?php

require_once "../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/TutoresBo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/TutoresObjeto.php";

$bo = new ModuloTutores();
#$action = "editarTutor";
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
        $obj->correo = $_POST['correo'];
        /*$obj->id = 4;#
        $obj->clave = "4545";
        $obj->nombre = "Edgar";
        $obj->ap_p = "Lopez";
        $obj->ap_m = "Martinez";
        $obj->id_asignatura = 2;
        $obj->horaio = "13:00 a 14:00";
        $obj->correo = "edgar@gmail.com";*/
        $res = $bo->editaDatosTutor($obj);
        print $res;
        break;
}
