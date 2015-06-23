/* global $ */
/* this is an example for validation and change events */
$.fn.numericInputExample = function () {
	'use strict';
	var element = $(this),
		footer = element.find('tfoot tr'),
		dataRows = element.find('tbody tr'),
		initialTotal = function () {
			var column, total, a,count;
			// se recorren todas las filas
			dataRows.each(function () {
				total = 0;
				count = 0;
				var row = $(this);	// row = fila actual
				for (column = 2; column < row.children().size()-1; column++) {  // size()-1 para no contar el ultimo y  parte del 2 por el nombre y  id de notas de alumno
						if( !isNaN(parseFloat(row.children().eq(column).text()))){
							total += parseFloat(row.children().eq(column).text()); // eq = posicion en la fila
							count++;
						}
				};
				total = total/(count); // total-2 por el nombre, id notas. ademas parte en 0, por eso no  se resta el promedio
				if(isNaN(total) || total == 0){ 
					total = " "; 
					row.children().eq(column).text(total);
				} else{
					row.children().eq(column).text(total.toPrecision(2)); // se guarda el promedio en la ultima columna de la fila
				}
				// console.log(total/(column-1) + " row , c=" + column);
			});
		};
	element.find('td').on('change', function (evt) {
		var cell = $(this),
			column = cell.index(),
			row,
			total = 0,
			count = 0;
		if (column === 0) {
			return;
		}
		element.find('tbody tr').each(function () {
			row = $(this);
			total = 0;
			count = 0;

			for (column = 2; column < row.children().size()-1; column++) {  // size()-1 para no cantar el ultimo
					if( !isNaN(parseFloat(row.children().eq(column).text()))){
						total += parseFloat(row.children().eq(column).text()); // eq = posicion en la fila
						count++;
					}
			};

			total = total/(count);

			if (total > 7.0) {  // aka esta el total permitido
				 $('.alert').show();
				 return false;  // changes can be rejected
			} else {
				$('.alert').hide();
				if(isNaN(total) || total == 0){
					total = " ";
					row.children().eq(column).text(total); 
				} else{
					row.children().eq(column).text(total.toPrecision(2)); 
				}
				
			}
		});
	}).on('validate', function (evt, value) {
		var cell = $(this),
			column = cell.index();
		if (column === 0) {
			return !!value && value.trim().length > 0;
		} else {
			if( value == "" ) return true;
			if(!isNaN(parseFloat(value)) && isFinite(value)){

				if( value <= 7.0 && value >= 2.0){  // antes de preguntar su valor, me aseguro  que es un numero
					return true;
				}else{  
					return false;}
			} else {
				return false; } 
		}
	});
	initialTotal();
	return this;
};
