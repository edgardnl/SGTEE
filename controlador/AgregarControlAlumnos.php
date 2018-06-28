<?php
require_once "../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/AlumnosBo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/AlumnosObjeto.php";

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/UsuariosObjetoAlumnos.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/controlador/EspecialControl.php";




$bo = new ModuloAlumnos();

$action = 'agregarAlumnos';
switch ($action) {#$_REQUEST['action']
    case 'agregarAlumnos':
        $especial = new EspecialControl();
        $obj = new AlumnosObjeto();
        $obj->matricula = $_POST['matricula'];
        $obj->password = $especial->generaPass();
        $obj->id_role = 5;
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
        $obj->materias_adeudadas = $_POST['materias_adeudadas'];
        $obj->estatus = 1;
                
        $obj1 = new UsuariosObjetoAlumnos();
        $obj1->alumnoID = $_POST['matricula'];        
        $obj1->tutorID = 0;
        $obj1->coordinadorID = 0;
        $obj1->administradorID = 0;
                
        $res = $bo->agregaAlumnos($obj,$obj1);
        print $res;
        break;

    

}

