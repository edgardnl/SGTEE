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

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/CanalizacionBo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/CanalizacionObjeto.php";

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/CalificacionesBo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/CalificacionesObjeto.php";

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/PersonalBo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/PersonalObjeto.php";

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/CatalogosBo.php";
//require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/CatalogosObjeto.php";

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
        $aluObj->matricula = $id;
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
    
    function mostrarUsuarioAlumnoPorClave($obj){
        $usuObj = new UsuariosObjeto();
        $usuObj->matricula = $obj;
        $usuBo = new ModuloUsuarios();
        return $usuBo->traeUsuarioPorClave($usuObj);
    }
    
    function mostrarCanalizacionPorActividad($id){
        $objCa = new CanalizacionObjeto();
        $objCa->id_actividades = $id;
        $modCa = new ModuloCanalizacion();
        return $modCa->traeCanalizacionPorIdActividad($objCa);
    }

    function selectNombreTutores(){
        $alumnoBo = new ModuloTutores();
        $tabla = $alumnoBo->consultaTutoresNombres();
        print $tabla;

    }

    function mostraActividadPorId($id){
        $obj = new ActividadesObjeto();
        $obj->id_actividades = $id;
        $mod = new ModuloActividades();
        return $mod->traeActividadesPorId($obj);
    }

    function tablaRelacionAlumnosNombrePorTutor($id){
        $relObj = new RelacionObjeto();
        $relObj->id_tutor = $id;
        $relaBo = new ModuloRelacion();
        $tabla = $relaBo->consultaAlumnosNombrePorIdTutor($relObj);
        print $tabla;
    }

    function tablaCalificacionesPorIdAlumno($id){
        $calObj = new CalificacionesObjeto();
        $calObj->matricula_alumno = $id;
        $calBo = new ModuloCalificaciones();
        $table = $calBo->traeCalificacionesPorIdAlumno($calObj);
        print $table;
    }

    function newLogin($id,$pass){
        session_start();
        $obj = new TutoresObjeto();
        $obj->matricula = $id;
        $obj->pass = $pass;
        $boT = new ModuloTutores();
        $objT = $boT->buscaTutorLogin($obj);
        $boA = new ModuloAlumnos();
        $objA = $boA->buscaAlumnoLogin($obj);
        $boP = new ModuloPersonal();
        $objCA = $boP->buscarCoordinadorAcLogin($obj);
        $objCE = $boP->buscarCoordinadorEsLogin($obj);
        $objCAd = $boP->buscarAdminLogin($obj);

        if ($id == 'Usuario' and $pass = 'password') {
            print "<div class='col-md-12' style='margin-top: 10px; margin-botton:10px;'>
                        <div class='alert alert-danger' role='alert' style='text-align: center'>
                            <strong>Error!</strong> Usuario o contraseña incorrecto.
			</div>
                    </div>";
        }elseif($objT->nRegistros == 1) {
            $_SESSION["id"] = $objT->matricula;
            $_SESSION["nom"] = $objT->nombre;
            header("Location:TutoInicio.php");
        }elseif ($objA->nRegistros == 1) {
            $_SESSION["id"] = $objA->matricula;
            $_SESSION["nom"] = $objA->nombre;
            header("Location:AlumInicio.php");
        }elseif ($objCA->nRegistros == 1) {
            $_SESSION["id"] = $objA->matricula;
            $_SESSION["nom"] = $objA->nombre;
            header("Location:CordInicio.php");
        }elseif ($objCE->nRegistros == 1) {
            $_SESSION["id"] = $objA->matricula;
            $_SESSION["nom"] = $objA->nombre;
            header("Location:CordInicio.php");
        }elseif ($objCAd->nRegistros == 1) {
            $_SESSION["id"] = $objA->matricula;
            $_SESSION["nom"] = $objA->nombre;
            header("Location:Inicio.php");
        }else {
            print "<div class='col-md-12' style='margin-top: 10px; margin-botton:10px;'>
                        <div class='alert alert-danger' role='alert' style='text-align: center'>
                            <strong>Error!</strong> Usuario o contraseña incorrecto.
			</div>
                    </div>";
        }
        
        //return $bo->buscaTutorLogin($obj);        
    }

    function selectParcial(){
        $catalogoBO = new ModuloCatalogos();
        $select = $catalogoBO->traeSelectParcial();
        print $select;
    }

    function selectAsignatura(){
        $catalogoBO = new ModuloCatalogos();
        $select = $catalogoBO->traeSelectAsignatura();
        print $select;
    }

    function selectProfesores(){
        $catalogoBO = new ModuloCatalogos();
        $select = $catalogoBO->traeSelectProfesores();
        print $select;
    }

}
