<?php 

function encriptar($cadena,$key){
	//Abrimos el módulo
	$descrip = mcrypt_module_open(MCRYPT_DES,'',MCRYPT_MODE_CFB,''); 
	//Asignamos un valor a la clave
	$tamanio = mcrypt_enc_get_key_size($descrip);
	$key = substr(md5($key),0,$tamanio); // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
    $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cadena, MCRYPT_MODE_CBC, md5(md5($key))));
    return $encrypted; //Devuelve el string encriptado
 
}
 
function desencriptar($cadena){
    //Abrimos el módulo
	$descrip = mcrypt_module_open(MCRYPT_DES,'',MCRYPT_MODE_CFB,''); 
	//Asignamos un valor a la clave
	$tamanio = mcrypt_enc_get_key_size($descrip);
	$key = substr(md5($key),0,$tamanio); // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
    $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($cadena), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
    return $decrypted;  //Devuelve el string desencriptado
}

?>
