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
<div class="span12">
	<div class="accordion" id="accordion2">
	  	<div class="accordion-group">
	  	<?php for($i = 0;$i < count($area);$i++){ ?>
	    	<div class="accordion-heading">
	      		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#acc<?php echo $i; ?>">
	        		<span class="label label-success"><i class="icon-search"></i><?php echo " ".$area[$i+1]; ?></span>
	      		</a>
	    	</div>
	    	<div id="acc<?php echo $i; ?>" class="accordion-body collapse">
	    		<?php 
	        	foreach ($concepto as $key => $value): 
	        		if($value->con_area==$i+1){
	        	?>
	      		<div class="accordion-inner">
	      			<i class="icon-share"></i>
	        		<?php
	    			echo $value->con_descripcion;
	    			?>
	      		</div>
	      		<?php 
	      		}
	      		endforeach ?>
	    	</div>
	    	<?php } ?>
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