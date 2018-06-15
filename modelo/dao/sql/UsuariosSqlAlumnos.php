<?php


class UsuariosSqlAlumnos {
    
    function ingresaUsuraioAlumnos(){
        $query = "insert into usuario(matricula,correo,contrasena,id_role) values(?,?,?,?);";
        return $query;
    }
    
    function eliminaUsuarioAlumnos(){
        $query = "delete from usuario where matricula = ?;";
        return $query;
    }
}
