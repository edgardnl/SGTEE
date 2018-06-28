<?php


class UsuariosSql {
    
    function ingresaUsuraioTutor(){
        $query = "insert into usuario(alumnoID,tutorID,coordinadorID,administradorID) values(?,?,?,?);";
        return $query;
    }
    
    function eliminaUsuarioTutor(){
        $query = "DELETE FROM usuario WHERE usuario.tutorID = ?;";
        return $query;
    }
    
    function traeUsuarioPorClave(){
        $query = "SELECT * FROM usuario where matricula = ? ;";
        return $query;
    }
}
