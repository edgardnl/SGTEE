<?php


class CanalizacionSql {
    
    function traeCanalizacionPorIdActividad(){
        $query ="SELECT * FROM canalizacion where id_actividades = ?;";
        return $query;
    }
    
    function guardaCanalizacion(){
        $query = "insert into canalizacion(id_actividades,id_area,encargado,observacion)value(?,?,?,?); ";
        return $query;
    }
}
