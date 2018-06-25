<?php

class EspecialControl
{
	
	function generaPass(){
		$cadena_base =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$cadena_base .= '0123456789' ;
		//$cadena_base .= '!@#%^&*()_,./<>?;:[]{}\|=+';
		$largo = 5;

		$password = '';
		$limite = strlen($cadena_base) - 1;

		for ($i=0; $i < $largo; $i++)
		    $password .= $cadena_base[rand(0, $limite)];

		return $password;

	}
}