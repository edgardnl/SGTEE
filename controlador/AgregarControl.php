<?php

require_once "../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/TutoresBo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/TutoresObjeto.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/TutoresObjeto.php";

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/ActividadesBo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/ActividadesObjeto.php";

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/CanalizacionObjeto.php";

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/CalificacionesBo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/CalificacionesObjeto.php";

$bo = new ModuloTutores();
//$action = "agregarActividad";
switch ($_REQUEST['action']) {#$_REQUEST['action']
    case 'agregarTutor':
        $obj = new TutoresObjeto();
        $obj->matricula = $_POST['clave'];
        $obj->pass = $_POST['pass'];
        $obj->id_role = 4;
        $obj->nombre = $_POST['nombre'];
        $obj->ap_p = $_POST['ap_p'];
        $obj->ap_m = $_POST['ap_m'];
        $obj->carrera = $_POST['carrera'];
        $obj->correo = $_POST['correo'];
        $obj->telefono = $_POST['tel'];
        $obj->sexo = $_POST['sexo'];

        $obj1 = new UsuariosObjeto();
        $obj1->alumnoID = 0;
        $obj1->tutorID = $_POST['clave'];        
        $obj1->coordinadorID = 0;
        $obj1->administradorID = 0;
        
        $res = $bo->agregaTutor($obj,$obj1);
        //header("Location:Tutores.php");
        //$resp = "Tutores.php";
        print $res;
        
        break;

    case 'agregarActividad':
        
        $modulo = new ModuloActividades();
        
        $obj = new ActividadesObjeto();
        $obj->id_seguimiento = $_POST['seg'];
        $obj->fecha = $_POST['fecha'];
        $obj->hora = $_POST['hora'];
        $obj->lugar = $_POST['lugar'];
        $obj->detecto_problematica = $_POST['problema'];
        $obj->avance = $_POST['avance'];
        $obj->id_motivo = $_POST['selector1'];
        
        if ($_POST['selector1'] == 3) {
            $objc = new CanalizacionObjeto();        
            $objc->id_area = $_POST['area'];
            $objc->encargado = $_POST['encargado'];
            $objc->observacion = $_POST['observacion'];
            $resA = $modulo->guardaActividadCa($obj,$objc);
            print $resA;
        } else {
            $resA = $modulo->guardaActividad($obj);
            print $resA;
        }
        
               

        /*$obj->id_seguimiento = 2;
        $obj->fecha = "2018-06-17";
        $obj->hora = "09:15:00";
        $obj->lugar = "Salon A10";
        $obj->detecto_problematica = "si";
        $obj->avance = "programacion";
        $obj->id_motivo = 1;*/

        
        
        break;

    case 'agregarCalificaciones':
        $objCal = new CalificacionesObjeto();
        $objCal->id_asignatura = $_POST['asignatura'];
        $objCal->id_parcial = $_POST['parcial'];
        $objCal->id_profesor = $_POST['profesor'];        
        $objCal->matricula_alumno = $_POST['idalu'];
        $objCal->calificaciones = $_POST['calificacion'];
        $modCal = new ModuloCalificaciones();
        $resC = $modCal->agregaCalificaciones($objCal);
        print $resC;
        break;
}

