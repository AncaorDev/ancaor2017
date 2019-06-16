<?php 
 function getDateTime($bool = true){
 	$getFecha = 'Y-m-d H:i:s'; 
 	if ($bool) {
 		$getFecha .= ' a';
 	} 
 	return date($getFecha);
 }


