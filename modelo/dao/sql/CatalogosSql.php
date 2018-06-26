<?php

class CatalogosSql {
    
    function treaParciales(){
        $query = "SELECT * FROM parcial;";
        return $query;
    }
    
    function traeProfesores(){
        $query = "SELECT * FROM profesores;";
        return $query;
    }
    
    function traeAsignaturas(){
        $query = "SELECT * FROM asignatura;";
        return $query;
    } 
}
