
<?php //echo $notas_1[0]->not_01; ?>
<?php //echo $notas_1[0]['not_01']; ?>
<?php //var_dump($notas_1); ?>
<?php 

//$notas_curso -> el numero de notas maximo
//$notas -> lista de todas las notas

?>

<div class="row">
	<div class="span12 text-center">
		<h3><?php echo $notas_1[0]->notMat->matAlu->getNombre_completo(); ?></h3>
	</div>
</div>

<div class="row">
	<div class="span12 text-left">
		<p class="text-info"><strong>Primer Periodo</strong></p>
	</div>	
</div>

<table class="table table-bordered" id="tabla_notas">
<thead>
    <tr>
    	<th>Asignatura</th>
    	<?php for ($i=1; $i <= $notas_curso; $i++) { ?>
    	<th><?php echo $i ?></th>
    	<?php } ?>
	</tr>
</thead>
<tbody>
	<?php foreach ($notas_1 as $key): ?>
    <tr>

		<td><strong><?php echo $key->notAsig->asi_descripcion; ?></strong></td>
		<?php for ($i=1; $i <= $notas_curso; $i++) { ?>

			<?php if($i < 10){ ?>
				<td id="nota"><?php echo $key['not_0'.$i]; ?></td>
			<?php
			}else{ ?>
				<td id="nota"><?php echo $key['not_'.$i]; ?></td>
			<?php } ?>
		
		<?php } ?>

    </tr>
    <?php endforeach ?>
</tbody>
</table>

<div class="row">
	<div class="span12 text-left">
		<p class="text-info"><strong>Segundo Periodo</strong></p>
	</div>	
</div>

<table class="table table-bordered" id="tabla_notas">
<thead>
    <tr>
    	<th>Asignatura</th>
    	<?php for ($i=1; $i <= $notas_curso; $i++) { ?>
    	<th><?php echo $i ?></th>
    	<?php } ?>
	</tr>
</thead>
<tbody>
	<?php foreach ($notas_2 as $key): ?>
    <tr>

		<td><strong><?php echo $key->notAsig->asi_descripcion; ?></strong></td>
		<?php for ($i=1; $i <= $notas_curso; $i++) { ?>

			<?php if($i < 10){ ?>
				<td id="nota"><?php echo $key['not_0'.$i]; ?></td>
			<?php
			}else{ ?>
				<td id="nota"><?php echo $key['not_'.$i]; ?></td>
			<?php } ?>
		
		<?php } ?>

    </tr>
    <?php endforeach ?>
</tbody>
</table>

<script type="text/javascript">
var tds = document.getElementsByTagName("td");

for(var i = 0, j = tds.length; i < j; ++i){
	if(tds[i].innerHTML < 4 ) tds[i].style.color = "#ff0000";
}
</script>