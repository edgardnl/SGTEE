<?php


class UsuariosSqlAlumnos {
    
    function ingresaUsuarioAlumnos(){
        $query = "insert into usuario(alumnoID,tutorID,coordinadorID,administradorID) values(?,?,?,?);";
        return $query;
    }
    
    function eliminaUsuarioAlumnos(){
        $query = "DELETE FROM usuario WHERE usuario.alumnoID = ?;";
        return $query;
    }
}
