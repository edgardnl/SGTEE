<?php

require_once "../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/CoordinadorBo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/AlumnosObjetoCoordinador1.php";

//estructura 

class MostrarTablaControlCoordinador1 {

    function tablaAlumnosCoordinador1() {
        $alumnosBo = new ModuloCoordinador1(); // acceso a mi estructura bo
        $alumnos = $alumnosBo->ConsultarAlumnosCordinador1();
        print $alumnos;
    }

    function MostrarDatosCoordinadorId($id) {
        $obj = new AlumnosObjetoCoordinador1();
        $obj->id = $id;
        $bo = new ModuloCoordinador1();
        return $bo->traeCoordinadorPorId($obj);
    }

}
