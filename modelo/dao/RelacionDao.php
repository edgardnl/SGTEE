<?php

require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/Conexion.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/procesaParametros.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/RelacionNombreObjeto.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/sql/RelacionSql.php";

class RelacionDao {

    private $con;

    function __construct() {
        $this->con = conexion::conectar();
    }

    function __destruct() {
        $this->con->close();
    }

    function traeRelacionTutoAlu() {
        $pP = RelacionSql::consultaRelacionesNombres();
        $query = $this->con->query($pP);
        $lista = [];
        $x = 0;
        while ($row = $query->fetch_array()) {
            $lista[] = new RelacionNombreObjeto();
            $lista[$x]->id_relacion = $row['id_relacion'];
            $lista[$x]->tutor = $row['nomtuto'] . " " . $row['apatuto'] . " " . $row['apmtuto'];
            $lista[$x]->alumno = $row['nomalu'] . " " . $row['apaalu'] . " " . $row['apmalu'];
            $x++;
        }
        return $lista;
    }
    
    function traeAlumnosPorIdTutor($obj){
        $usuarioArray = array($obj->id_tutor);
        $pP = procesaParametros::PrepareStatement(RelacionSql::consultaAlumnosPorIdTutor(), $usuarioArray);
        $query = $this->con->query($pP);
        $lista = [];
        $x = 0;
        while ($row = $query->fetch_array()) {
            $lista[] = new RelacionObjeto();
            $lista[$x]->id_relacion = $row['id_relacion'];
            $lista[$x]->id_alumno = $row['id_alumno'];            
            $lista[$x]->NomAll = $row['nombre'] . " " . $row['ap_p'] . " " . $row['ap_m'];
            $lista[$x]->materias = $row['materias_adeudadas'];
            $lista[$x]->aprobacion = $row['aprobacion'];
            $lista[$x]->observacion = $row['observacion'];            
            $x++;
        }
        return $lista;
    }

}
