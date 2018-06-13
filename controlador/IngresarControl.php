<?php

require_once "../ruta.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/bo/UsuariosBo.php";
require_once $_SERVER['DOCUMENT_ROOT'] . ruta::ruta . "/modelo/objetos/UsuariosObjeto.php";

$bo = new ModuloUsuarios();

$action = "login";
switch ($action) {#$_REQUEST['action']
    case 'login':
        $obj = new UsuariosObjeto();
        $obj->usuario = $_POST['usua'];#$_POST['usua']
        $obj->contrasena = $_POST['passw'];#$_POST['passw']
        $res = $bo->validarUsuario($obj);
        if ($res->id_role == 2 ) {
        	//print "TutoInicio.php";
            header("Location:TutoInicio.php");
        }elseif ($res->id_role == 1) {
        	print "Inicio.php";
        }elseif ($res->id_role == 3) {
        	print "CordInicio.php";
        }elseif ($res->id_role == 4) {
        	print "AlumInicio.php";
        }else{
        	print "Incorrecto";
        }
        break;
}