
<?php

//esta clase se puede llamar desde cualquier lugar
//se llama como cualquier funcion Fecha::funcion();
class Fecha extends CApplicationComponent {
 	
 	/**
		la funcion devuelve la fecha actual
		ejemplo: Viernes, 03 de julio. 2015
 	*/
	public static function fecha_actual(){

        date_default_timezone_set('America/Santiago');

        $dias = array('1'=>'Lunes','2'=>'Martes','3'=>'Miercoles','4'=>'Jueves','5'=>'Viernes','6'=>'Sabado','7'=>'Domingo');
        $meses = array('1'=>'Enero','2'=>'Febrero','3'=>'Marzo','4'=>'Abril','5'=>'Mayo','6'=>'Junio','7'=>'Julio','8'=>'Agosto',
            '9'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre');
        $dia = $dias[date('N')];
        $dia_numero = date('d');
        $mes = $meses[date('n')];
        $anio = date('Y');
        $fecha_actual = $dia.", ".$dia_numero." de ".$mes.". ".$anio;

        return $fecha_actual;
    }
 
}
?>