<?php

require_once "../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/TutoresBo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/TutoresObjeto.php";

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/ActividadesBo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/ActividadesObjeto.php";

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/CalificacionesBo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/CalificacionesObjeto.php";

$bo = new ModuloTutores();
#$action = "editarTutor";
switch ($_REQUEST['action']) {#$_REQUEST['action']
    case 'editarTutor':
        $obj = new TutoresObjeto();
        $obj->matricula = $_POST['id'];#
        //$obj->clave = $_POST['clav'];
        $obj->nombre = $_POST['nom'];
        $obj->ap_p = $_POST['apa'];
        $obj->ap_m = $_POST['ama'];
        $obj->carrera = $_POST['carrera'];
        $obj->sexo = $_POST['sexo'];
        $obj->correo = $_POST['correo'];
        $obj->telefono = $_POST['tel'];
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

    case 'editarActividad':
        $objAc = new ActividadesObjeto();
        $objAc->id_actividades = $_POST['acti'];         
        $objAc->fecha = $_POST['fecha'];
        $objAc->hora = $_POST['hora'];
        $objAc->lugar = $_POST['lugar'];
        $objAc->detecto_problematica = $_POST['problema'];
        $objAc->avance = $_POST['avance'];        
        $objAc->motivo = $_POST['selector1'];
        $modulo = new ModuloActividades();
        $resAc = $modulo->editarActividad($objAc);
        print $resAc;

        break;
    case 'actualizaCalificaciones':
        $objCali = new CalificacionesObjeto();
        $objCali->id_calificiones = $_POST['idcal'];
        $objCali->id_parcial = $_POST['parcial'];
        $objCali->id_asignatura = $_POST['asignatura'];
        $objCali->id_profesor = $_POST['profesor'];
        $objCali->calificaciones = $_POST['calificacion'];
        
        $modCali = new ModuloCalificaciones();
        $resCali = $modCali->editaCalificacionesPorId($objCali);
        print $resCali;
        
        break;
}
