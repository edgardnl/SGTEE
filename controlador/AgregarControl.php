<?php

require_once "../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/TutoresBo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/TutoresObjeto.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/TutoresObjeto.php";

$bo = new ModuloTutores();

switch ($_REQUEST['action']) {#
    case 'agregarTutor':
        $obj = new TutoresObjeto();
        $obj->clave = $_POST['clave'];
        $obj->nombre = $_POST['nombre'];
        $obj->ap_p = $_POST['ap_p'];
        $obj->ap_m = $_POST['ap_m'];
        $obj->asignatura = 4;
        $obj->horaio = $_POST['horario'];
        $obj->correo = $_POST['correo'];
        
        $obj1 = new UsuariosObjeto();
        $obj1->matricula = $_POST['clave'];
        $obj1->correo = $_POST['correo'];
        $obj1->contrasena = $_POST['pass'];
        $obj1->id_role = 2;
        
        $res = $bo->agregaTutor($obj,$obj1);
        //header("Location:Tutores.php");
        //$resp = "Tutores.php";
        print $res;
        
        break;
}

