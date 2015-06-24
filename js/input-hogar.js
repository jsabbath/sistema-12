/* global $ */
/* this is an example for validation and change events */
$.fn.numericInputExample = function () {
	'use strict';
	var element = $(this),
		footer = element.find('tfoot tr'),
		dataRows = element.find('tbody tr');

	element.find('td').on('change', function (evt) {
		 window.onbeforeunload = function() {
                        return "";
                    }
	}).on('validate', function (evt, value) {
		var cell = $(this),
			column = cell.index();
		if (column === 0) {
			return !!value && value.trim().length > 0;
		} else {
			if( value == "" ) return true;
			if(isNaN(value)){

				if( value.toUpperCase() == "L" || 
					value.toUpperCase() == "ML" || 
					value.toUpperCase() == "PL" || 
					value.toUpperCase() == "NE" ){  
					return true;
				}else{  
					return false;}
			} else {
				return false; 
			} 
		}
	});
	return this;
};
