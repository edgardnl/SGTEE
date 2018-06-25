<?php

require_once "../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/TutoresBo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/TutoresObjeto.php";

$bo = new ModuloTutores();
//$action = "editarTutor";
switch ($_REQUEST['action']) {#$_REQUEST['action']
    case 'eliminarTutor':
        $obj = new TutoresObjeto();
        $obj->id = $_POST['id']; #                
        $res = $bo->eliminaDatosTutor($obj);
        //header("Location:Tutores.php");
        print $res;
        break;
    
    case 'eliminarActividad':
        
        break;
        
            
}
