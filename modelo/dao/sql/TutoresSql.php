<?php

class TutoresSql {

    function traeTutores() {
        $query = "SELECT * FROM tutor;";
        return $query;
    }

    function agregaTutores() {
        $query = "insert into tutor(clave,nombre,ap_p,ap_m,id_asignatura,horario,correo) values(?,?,?,?,?,?,?);";
        return $query;
    }
    
    function traeTutorPorClave(){
        $query = "SELECT * FROM tutor WHERE clave = ? ;";
        return $query;
    }
    
    function traeTutorPorId(){
        $query = "SELECT * FROM tutor WHERE id_tutores = ? ;";
        return $query;
    }
    
    function editaDatosTutor($obj){
        $query = "update tutor set clave = '".$obj->clave."', nombre = '".$obj->nombre."', ap_p = '".$obj->ap_p."', ap_m = '".$obj->ap_m."', id_asignatura = ".$obj->id_asignatura.",horario = '".$obj->horaio."',correo = '".$obj->correo."' where id_tutores = ".$obj->id.";";
        return $query;
    }
    
    function eliminaDatosTutor(){
        $query = "delete from tutor where id_tutores = ?;";
        return $query;# 
    }

}
