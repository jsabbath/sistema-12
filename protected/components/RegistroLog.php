<?php

//esta clase se puede llamar desde cualquier lugar
//se llama como cualquier funcion RegistroLog::funcion();
class RegistroLog extends CApplicationComponent {
 	
 	/*
		La funcion registroNotas() guarda en un archivo de texto los datos del usuario activo y la hora
		El archivo está ubicado en /sistema/log/notas	
 	*/
	public static function registroNotas() {

		$direccion = realpath(Yii::app()->basePath.'/../log/');
		$usuario = Yii::app()->user->email;

		var_dump($direccion);

		date_default_timezone_set('America/Santiago');
		$fecha = Date('Y-m-d');
		$hora = Date("H:i:s");

		$registro = $usuario." - ".$hora;

		if ($file = fopen($direccion.'/notas/'.$fecha.'.txt',"a")) {
			fwrite($file,$registro.PHP_EOL);

			fclose($file);
		}else{
			echo "No hay archivo";
		}
	}

	/*
		La funcion registroInforme() guarda en un archivo de texto los datos del usuario activo y la hora
		El archivo está ubicado en /sistema/log/informe	
 	*/
	public static function registroInforme() {

		$direccion = realpath(Yii::app()->basePath.'/../log/');
		$usuario = Yii::app()->user->email;

		var_dump($direccion);

		date_default_timezone_set('America/Santiago');
		$fecha = Date('Y-m-d');
		$hora = Date("H:i:s");

		$registro = $usuario." - ".$hora;

		if ($file = fopen($direccion.'/informe/'.$fecha.'.txt',"a")) {
			fwrite($file,$registro.PHP_EOL);

			fclose($file);
		}else{
			echo "No hay archivo";
		}
	}
 
}
?>