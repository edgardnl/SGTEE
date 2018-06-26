<?php


class CanalizacionSql {
    
    function traeCanalizacionPorIdActividad(){
        $query ="SELECT * FROM canalizacion where id_actividades = ?;";
        return $query;
    }
    
    function guardaCanalizacion(){
        $query = "insert into canalizacion(id_actividades,area,encargado,observacion)value(?,?,?,?); ";
        return $query;
    }

    function existeCanalizacion(){
    	$query = "SELECT COUNT(canalizacion.id_actividades) as nActividades FROM canalizacion WHERE canalizacion.id_actividades = ?;";
        return $query;	
    }

    function eliminaCanalizacion(){
    	$query = "DELETE FROM canalizacion WHERE canalizacion.id_actividades = ?;";
        return $query;		
    }
}
