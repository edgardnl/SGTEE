<?php

require_once "../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/CoordinadorBo.php";
//require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/TutoresObjeto.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/AlumnosObjetoCoordinador1.php";

$bo = new ModuloCoordinador1();
//$action = "editarTutor";
switch ($_REQUEST['action']) {#$_REQUEST['action']
    case 'eliminarCoordinador':
        $obj = new AlumnosObjetoCoordinador1();
        $obj->id = $_POST['id'];               
        $res = $bo->eliminaDatosCoordinador($obj);
        header("Location:Coordinadora1.php");
        break;
        
}
