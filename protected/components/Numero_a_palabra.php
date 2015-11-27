<?php

//esta clase se puede llamar desde cualquier lugar
//se llama como cualquier funcion Num_a_palabra::funcion();
class Numero_a_palabra extends CApplicationComponent {

	public static function convert($number) {

	    $hyphen      = '-';
	    $conjunction = ' Y ';
	    $separator   = ', ';
	    $negative    = 'NEGATIVO ';
	    $decimal     = ' COMA ';
	    $dictionary  = array(
	        0                   => 'CERO',
	        1                   => 'UNO',
	        2                   => 'DOS',
	        3                   => 'TRES',
	        4                   => 'CUATRO',
	        5                   => 'CINCO',
	        6                   => 'SEIS',
	        7                   => 'SIETE',
	        8                   => 'OCHO',
	        9                   => 'NUEVE',
	        10                  => 'DIEZ',
	    );

	    if (!is_numeric($number)) {
	    	if( $number == "MB"){
	    		return "MUY BUENO";
	    	} else if( $number == "B" ){
	    		return "BUENO";
	    	} else if( $number == "S"){
	    		return "SUFICIENTE";
	    	} else if( $number == "I" ){
	    		return "INSUFICIENTE";
	    	}

	        return false;
	    }

	    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
	        // overflow
	        trigger_error(
	            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
	            E_USER_WARNING
	        );
	        return false;
	    }

	    if ($number < 0) {
	        return $negative . convert_number_to_words(abs($number));
	    }

	    $string = $fraction = null;

	    if (strpos($number, '.') !== false) {
	        list($number, $fraction) = explode('.', $number);
	    }

	    switch (true) {
	        case $number < 21:
	            $string = $dictionary[$number];
	            break;
	        case $number < 100:
	            $tens   = ((int) ($number / 10)) * 10;
	            $units  = $number % 10;
	            $string = $dictionary[$tens];
	            if ($units) {
	                $string .= $hyphen . $dictionary[$units];
	            }
	            break;
	        case $number < 1000:
	            $hundreds  = $number / 100;
	            $remainder = $number % 100;
	            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
	            if ($remainder) {
	                $string .= $conjunction . convert_number_to_words($remainder);
	            }
	            break;
	        default:
	            $baseUnit = pow(1000, floor(log($number, 1000)));
	            $numBaseUnits = (int) ($number / $baseUnit);
	            $remainder = $number % $baseUnit;
	            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
	            if ($remainder) {
	                $string .= $remainder < 100 ? $conjunction : $separator;
	                $string .= convert_number_to_words($remainder);
	            }
	            break;
	    }

	    if (null !== $fraction && is_numeric($fraction)) {
	        $string .= $decimal;
	        $words = array();
	        foreach (str_split((string) $fraction) as $number) {
	            $words[] = $dictionary[$number];
	        }
	        $string .= implode(' ', $words);
	    }

	    return $string;
	}
}
?>
