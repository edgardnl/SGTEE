<?php
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/modelo/dao/RelacionDao.php";
require_once $_SERVER['DOCUMENT_ROOT'].ruta::ruta."/vista/php/RelacionVista.php";

class ModuloRelacion{
    
    private $vista;
    private $dao;
	
    function __construct(){
	$this->dao = new RelacionDao();
    $this->vista = new RelacionVista();
    }

    function consultaRelacionNombre(){
	$usu = $this->dao->traeRelacionTutoAlu();
    $vis = $this->vista->generaTablaRelacionNombre($usu);
	return $vis;
    }
    
    function consultaAlumnosPorIdTutor($obj){
        $usu = $this->dao->traeAlumnosPorIdTutor($obj);
        $vis = $this->vista->generaTablaAlumosPorTutor($usu);
        return $vis;
    }

    function consultaAlumnosNombrePorIdTutor($obj){//generaTablaAlumosNombrePorTutor($data)
        $usu = $this->dao->traeAlumnosPorIdTutor($obj);
        $vis = $this->vista->generaTablaAlumosNombrePorTutor($usu);
        return $vis;
    }
}