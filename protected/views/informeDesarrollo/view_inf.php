<?php 
//var_dump($area);
?>

<div class="span12">
	<div class="text-center">
		<h2><?php echo $informe; ?></h2>
	</div>
</div>

<div class="span12">
	<div class="text-left">
		<?php echo CHtml::link("Regresar" , array("/informeDesarrollo/inf_d") , array('class' => 'btn btn-warning')); ?>
	</div>
	<br/>
</div>

<?php if ($area) { ?>
<div class="row">
<div class="span12">
	<div class="accordion" id="accordion2">
	  	<div class="accordion-group">
	  	<?php
	  	$i=0; 
	  	foreach ($area as $key => $value) { ?>
	    	<div class="accordion-heading">
	      		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#acc<?php echo $i; ?>">
	        		<span class="label label-success"><i class="icon-search"></i><?php echo " ".$value->are_descripcion; ?></span>
	      		</a>
	    	</div>
	    	<div id="acc<?php echo $i; ?>" class="accordion-body collapse">
	    		<?php 
	        	foreach ($concepto as $key => $valor): 
	        		if($valor->con_area==$value->are_id){
	        	?>
	      		<div class="accordion-inner">
	      			<i class="icon-share"></i>
	        		<?php
	    			echo $valor->con_descripcion;
	    			?>
	      		</div>
	      		<?php 
	      		}
	      		endforeach ?>
	    	</div>
	    	<?php
	    	$i++;
	    	 } ?>
	  	</div>
	</div>
</div>
</div>
<?php 
}else{
?>
<div class="span12">
	<div class="text-center">
		<p class="text-error">Este informe se encuentra vacio</p>
	</div>
</div>
<?php
}
?>