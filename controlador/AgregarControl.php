<?php

require_once "../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/TutoresBo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/TutoresObjeto.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/TutoresObjeto.php";

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/ActividadesBo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/ActividadesObjeto.php";

$bo = new ModuloTutores();
$action = "agregarActividad";
switch ($action) {#$_REQUEST['action']
    case 'agregarTutor':
        $obj = new TutoresObjeto();
        $obj->clave = $_POST['clave'];
        $obj->nombre = $_POST['nombre'];
        $obj->ap_p = $_POST['ap_p'];
        $obj->ap_m = $_POST['ap_m'];
        $obj->asignatura = $_POST['asignat'];
        $obj->horaio = $_POST['horario'];
        $obj->correo = $_POST['correo'];
        
        $obj1 = new UsuariosObjeto();
        $obj1->matricula = $_POST['clave'];
        //$obj1->correo = $_POST['correo'];
        $obj1->contrasena = $_POST['pass'];
        $obj1->id_role = 2;
        
        $res = $bo->agregaTutor($obj,$obj1);
        //header("Location:Tutores.php");
        //$resp = "Tutores.php";
        print $res;
        
        break;

    case 'agregarActividad':
        $obj = new ActividadesObjeto();
        $obj->id_seguimiento = $_POST['seg'];
        $obj->fecha = $_POST['fecha'];
        $obj->hora = $_POST['hora'];
        $obj->lugar = $_POST['lugar'];
        $obj->detecto_problematica = $_POST['problema'];
        $obj->avance = $_POST['avance'];
        $obj->id_motivo = $_POST['selector1'];

        /*$obj->id_seguimiento = 2;
        $obj->fecha = "2018-06-17";
        $obj->hora = "09:15:00";
        $obj->lugar = "Salon A10";
        $obj->detecto_problematica = "si";
        $obj->avance = "programacion";
        $obj->id_motivo = 1;*/

        $modulo = new ModuloActividades();
        $resA = $modulo->guardaActividad($obj);
        print $resA;
        break;
}

