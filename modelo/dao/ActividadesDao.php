<?php
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/Conexion.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/procesaParametros.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/ActividadesObjeto.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/sql/ActividadesSql.php";

class ActividadesDao {
    private $con;

    function __construct() {
        $this->con = conexion::conectar();
    }

    function __destruct() {
        $this->con->close();
    }
    
    function traeActividadesPorAlumno($obj){
        $datosArray = array($obj->id_alumno);
        $pP = procesaParametros::PrepareStatement(ActividadesSql::traeActividadesporAlumno(),$datosArray);
       
        $query = $this->con->query($pP);
        $lista = [];
        $x = 0;
        while ($row = $query->fetch_array()) {
            $lista[] = new ActividadesObjeto();
            $lista[$x]->id_actividades = $row['id_actividades'];
            $lista[$x]->ntutor = $row['tutor'];
            $lista[$x]->nAlumno = $row['alumno'];
            $lista[$x]->fecha = $row['fecha'];
            $lista[$x]->hora = $row['hora'];            
            $lista[$x]->lugar = $row['lugar'];
            $lista[$x]->detecto_problematica = $row['detecto_problematica'];
            $lista[$x]->avance = $row['avance'];
            $lista[$x]->motivo = $row['motivo'];
            $x++;
        }
        return $lista;
    }
}
