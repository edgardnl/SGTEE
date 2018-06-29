<?php
require_once "../ruta.php";

//coordinadora 
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/RelacionObjeto.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/CoordinadorRelacionBo.php";


$bo = new ModuloRelacion_Alumno_Tutor();

switch ($_REQUEST['action']) {
    /*
    case 'agregarAlumnos':
        $obj = new AlumnosObjeto();
        $obj->matricula = $_POST['matricula'];
        $obj->nombre = $_POST['nombre'];
        $obj->ap_p = $_POST['ap_p'];
        $obj->ap_m = $_POST['ap_m'];
        $obj->grupo = $_POST['grupo'];
        $obj->carrera = $_POST['carrera'];
        $obj->telefono = $_POST['telefono'];
        $obj->telefono_cel =$_POST['telefono_cel'];
        $obj->semestre = $_POST['semestre'];
        $obj->correo = $_POST['correo'];
        $obj->sexo = $_POST['sexo'];


        $obj1 = new UsuariosObjetoAlumnos();
        $obj1->matricula_usuario= $_POST['matricula'];
        $obj1->correo = $_POST['correo'];
        $obj1->contrasena = $_POST['contrasena'];
        $obj1->id_role = 1;
        
        //$obj->correo = $_POST['correo'];
        $res = $bo->agregaAlumnos($obj,$obj1);
        print $res;
        break;
*/
    case 'agregarCoordinador':
        $obj = new RelacionObjeto();
        $obj->matricula_alumno = $_POST['idalu'];
        $obj->matricula_tutor = $_POST['tutor'];
        $obj->aprobacion= $_POST['aprobacion'];
        $obj->observacion = $_POST['observacion'];
        $obj->statusAlum = 0;
                
        $res = $bo->agregaCoordinador1($obj);
        print $res;
    break;


}

