<?php 


//Funciones php
function Encriptarv1($string) {
  $long = strlen($string);
  $str = '';
  //Estudiarlo 
  for ($i=0; $i < $long ; $i++) {
     $str .= ($i % 2) != 0 ? md5($string[$i]) : $i;
  }
  return md5($str);
}

///

function encriptar($cadena){
	$llave = "lidia";
	$len = base64_encode(strlen($cadena));
	$tamanio = strlen($llave);
	$key = substr(md5($llave),0,$tamanio); // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
    $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cadena, MCRYPT_MODE_CBC, md5(md5($key))));
    return $encrypted."+/0LPdc1>".$len; //Devuelve el string encriptado
 
}
 
function desencriptar($cadena){
	$llave = "lidia";
	// $num = strstr($cadena,"<>");
	$cadena = strstr($cadena,"+/0LPdc1>",true);
	$tamanio = strlen($llave);
	$key = substr(md5($llave),0,$tamanio); // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
    $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($cadena), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
    return $decrypted;  //Devuelve el string desencriptado
}

 
function passCripter($data,$llave){
	//Abrimos el módulo
	$descrip = mcrypt_module_open(MCRYPT_DES,'',MCRYPT_MODE_CFB,'');


	//Asignamos un valor a la clave
	$tamanio = mcrypt_enc_get_key_size($descrip);
	$clave = substr(md5($llave),0,$tamanio);

	//Creamos el vector de inicializacion
	$tama_iv = mcrypt_enc_get_iv_size($descrip);
	$iv = mcrypt_create_iv($tama_iv,MCRYPT_RAND);	
	
	$texto = $data;
	//Ciframos un texto
	$texto_cifrado = mcrypt_encrypt(MCRYPT_DES,$clave,$texto,MCRYPT_MODE_CFB,$iv);
	//Mostramos el texto cifrado
	return $texto_cifrado;
}
 

function encrypt ($input,$key) {
    $output = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $input, MCRYPT_MODE_CBC, md5(md5($key))));
    return $output;
}
 
function decrypt ($input,$key) {
	$output = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($input), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
    return $output;
}
?>