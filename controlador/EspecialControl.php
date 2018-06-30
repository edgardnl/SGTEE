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

	function encriptar($texto){
	    $key='sgtee';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
	    $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $texto, MCRYPT_MODE_CBC, md5(md5($key))));
	    return $encrypted;
	}
	
	function desencriptar($texto){
	    $key='sgtee';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
	    $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($texto), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
	    return $decrypted;
	}
}