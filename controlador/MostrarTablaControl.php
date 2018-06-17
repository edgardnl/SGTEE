<?php

require_once "../ruta.php";

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/TutoresBo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/TutoresObjeto.php";

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/UsuariosBo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/UsuariosObjeto.php";

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/AlumnosBo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/AlumnosObjeto.php";

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/ActividadesBo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/ActividadesObjeto.php";

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/RelacionBo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/RelacionObjeto.php";

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/SeguimientoTutorBo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/SeguimientoTutorObjeto.php";

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
        session_start();
        $bo = new ModuloUsuarios();
        $boTu = new ModuloTutores();
        $obj = new UsuariosObjeto();
        $objtu = new TutoresObjeto();
        $obj->matricula = $u;
        $obj->contrasena = $p;
        $res = $bo->validarUsuario($obj);
        if ($res->id_role == 2 ) {
            //print "TutoInicio.php";
            $objtu->clave = $res->matricula;
            $r = $boTu->traeTutorPorClave($objtu);
            $_SESSION["id"] = $r->id;
            $_SESSION["nom"] = $r->nombre;
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
        $actiObj = new ActividadesObjeto();
        $actiObj->id_alumno = $id;
        $acti = new ModuloActividades();
        $tabla = $acti->traeActividadesPorAlumno($actiObj);
        print $tabla;

    }
    
    function tablaRelacionAlumnosPorTutor($id){
        $relObj = new RelacionObjeto();
        $relObj->id_tutor = $id;
        $relaBo = new ModuloRelacion();
        $tabla = $relaBo->consultaAlumnosPorIdTutor($relObj);
        print $tabla;
    }

    function mostrarAlumnoDetalles($id){
        $aluObj = new AlumnosObjeto();
        $aluObj->id = $id;
        $aluBo = new ModuloAlumnos();
        return $aluBo->traeAlumnosPorId($aluObj);
    }

    function tablaSeguimientoTutorAlumnoActividades($id){
        $segObj = new SeguimientoTutorObjeto();
        $segObj->id_tutor = $id;
        $segBo = new ModuloSeguimientoTutor();
        $tabla = $segBo->traeSeguimientoActividades($segObj);
        print $tabla;
    }

    function tablaActividadesPorIdSeguimiento($id){
        $actiObj = new ActividadesObjeto();
        $actiObj->id_seguimiento = $id;
        $acti = new ModuloActividades();
        $tabla = $acti->traeActividadesPorIdSeguimiento($actiObj);
        print $tabla;        
    }

    function mostrarDatosSeguimientoTutoAlum($id){
        $segObj = new SeguimientoTutorObjeto();
        $segObj->id_seguimiento = $id;
        $segBo = new ModuloSeguimientoTutor();
        return $segBo->traeSegumientoDatosAlumnoTutor($segObj);
        
    }

}
