<?php

//esta clase se puede llamar desde cualquier lugar
//se llama como cualquier funcion Rut::funcion();
class Rut extends CApplicationComponent {
 	
 	/*
		la funcion recibe un numero tipo 225468963
		y devuelve el rut formateado 22.546.896-3
 	*/
	public static function formato($rut) {

		return number_format( substr ( $rut, 0 , -1 ) , 0, "", ".") . '-' . substr ( $rut, strlen($rut) -1 , 1 );
	}
 
}
?>