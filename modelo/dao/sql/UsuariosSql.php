<?php


class UsuariosSql {
    
    function ingresaUsuraioTutor(){
        $query = "insert into usuario(matricula,contrasena,id_role) values(?,?,?);";
        return $query;
    }
    
    function eliminaUsuarioTutor(){
        $query = "delete from usuario where matricula = ?;";
        return $query;
    }
}
