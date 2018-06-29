<?php
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/Conexion.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/procesaParametros.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/AsignaturasObjeto.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/ParcialObjeto.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/ProfesoresObjeto.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/dao/sql/CatalogosSql.php";

class CatalogosDao {
    private $con;

    function __construct() {
        $this->con = conexion::conectar();
    }

    function __destruct() {
        $this->con->close();
    }
    
    function traeParcial(){
        $pP = CatalogosSql::treaParciales();
        $query = $this->con->query($pP);
        $lista = [];
        $x = 0;
        while ($row = $query->fetch_array()) {
            $lista[] = new ParcialObjeto();
            $lista[$x]->id_parcial = $row['id_parcial'];
            $lista[$x]->parcial = $row['parcial'];            
            $x++;
        }
        return $lista;
    }
    
    function traeAsignaturas(){
        $pP = CatalogosSql::traeAsignaturas();
        $query = $this->con->query($pP);
        $lista = [];
        $x = 0;
        while ($row = $query->fetch_array()) {
            $lista[] = new AsignaturasObjeto();
            $lista[$x]->id_asignatura = $row['id_asignatura'];
            $lista[$x]->asignatura = $row['asignatura'];            
            $x++;
        }
        return $lista;
    }
    
    function traeProfesores(){
        $pP = CatalogosSql::traeProfesores();
        $query = $this->con->query($pP);
        $lista = [];
        $x = 0;
        while ($row = $query->fetch_array()) {
            $lista[] = new ProfesoresObjeto();
            $lista[$x]->id_profesor = $row['id_profesor'];
            $lista[$x]->nombreAll = $row['nombre']." ".$row['ap_p']." ".$row['ap_m'];            
            $x++;
        }
        return $lista;
    }
}
