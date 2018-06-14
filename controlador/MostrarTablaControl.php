<?php

require_once "../ruta.php";

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/TutoresBo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/TutoresObjeto.php";

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/UsuariosBo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/UsuariosObjeto.php";

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/AlumnosBo.php";

class MostrarTablaControl {

    function tablaTutores() {
        $tutoresBo = new ModuloTutores();
        $tutores = $tutoresBo->consultaTutores();
        print $tutores;
    }

    //Controler de prueba
    function mostarDatosTutor($clav) {
        $clave = $clav;
        $obj = new TutoresObjeto();
        $obj->clave = $clave;
        $bo = new ModuloTutores();
        return $bo->traeTutorPorClave($obj);
    }
    
    function mostrarDatosTutorId($id){
        $obj = new TutoresObjeto();
        $obj->id = $id;
        $bo = new ModuloTutores();
        return $bo->traeTutoresPorId($obj);
    }

    function direccionLogin($u,$p){
        $bo = new ModuloUsuarios();
        $obj = new TutoresObjeto();
        $obj->usuario = $u;
        $obj->contrasena = $p;
        $res = $bo->validarUsuario($obj);
        if ($res->id_role == 2 ) {
            //print "TutoInicio.php";
            header("Location:TutoInicio.php");
        }elseif ($res->id_role == 1) {
            header("Location:Inicio.php");            
        }elseif ($res->id_role == 3) {
            header("Location:CordInicio.php");
        }elseif ($res->id_role == 4) {
            header("Location:AlumInicio.php");            
        }else{
            print "<div class='col-md-12' style='margin-top: 10px; margin-botton:10px;'>
                        <div class='alert alert-danger' role='alert' style='text-align: center'>
                            <strong>Error!</strong> Usuario o contraseña incorrecto.
			</div>
                    </div>";
        }
    }

    function tablaAlumnosActividades(){
        $alumnoBo = new ModuloAlumnos();
        $tabla = $alumnoBo->traeAlumnosActividades();
        print $tabla;

    }

    function tablaActividadesPorAlumno($id){
        

    }

}
