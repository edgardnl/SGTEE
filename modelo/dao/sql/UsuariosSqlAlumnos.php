<?php


class UsuariosSqlAlumnos {
    
    function ingresaUsuarioAlumnos(){
        $query = "insert into usuario(matricula,contrasena,id_role) values(?,?,?);";
        return $query;
    }
    
    function eliminaUsuarioAlumnos(){
        $query = "delete from usuario where matricula = ?;";
        return $query;
    }
}
