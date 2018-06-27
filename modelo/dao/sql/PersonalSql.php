<?php

class PersonalSql {
    function buscaCoordinadorAcLogin(){
        $query = "select * from coordinador where coordinador.matricula = ? and coordinador.password = ? and coordinador.id_role = 2;";
        return $query;
    }
    
    function buscaCoordinadorEsLogin(){
        $query = "select * from coordinador where coordinador.matricula = ? and coordinador.password = ? and coordinador.id_role = 3;";
        return $query;
    }
    
    function buscaAdminLogin(){
        $query = "select * from administrador where administrador.matricula = ? and administrador.password = ?;";
        return $query;
    }
}
