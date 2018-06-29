<?php

require_once "../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/TutoresBo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/TutoresObjeto.php";

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/ActividadesBo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/ActividadesObjeto.php";

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/CalificacionesBo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/CalificacionesObjeto.php";

$bo = new ModuloTutores();
//$action = "editarTutor";
switch ($_REQUEST['action']) {#$_REQUEST['action']
    case 'eliminarTutor':
        $obj = new TutoresObjeto();
        $obj->matricula = $_POST['id']; #                
        $res = $bo->eliminaDatosTutor($obj);
        //header("Location:Tutores.php");
        print $res;
        break;
    
    case 'eliminarActividad':
    	$objAc = new ActividadesObjeto();
        $objAc->id_actividades = $_POST['acti'];                 
        $modulo = new ModuloActividades();
        $resAc = $modulo->eliminarActividad($objAc);
        print $resAc;
        
        break;
    
    case 'eliminarCalificacion':
        $objCalE = new CalificacionesObjeto();
        $objCalE->id_calificiones = $_POST['idcal'];
        $modCalE = new ModuloCalificaciones();
        $resCAlE = $modCalE->eliminaCalificacionesPorId($objCalE);
        print $resCAlE;
        break;
        
            
}
