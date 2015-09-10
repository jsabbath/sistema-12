<?php
//var_dump($lista);
$i = 0;
$k = 0;
?>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/Chart.min.js"></script>

<br>
<div class="row">
	<div class="span9 offset1">
		<h3><?php echo $usuario->getNombreCorto()." : ".$asignatura->asi_descripcion; ?></h3>
	</div>
	<div class="span2 text-right">
		<?php echo CHtml::link("Regresar", array('Notas/mis_asignaturas'), array('class'=>'btn btn-warning')); ?>
	</div>
</div>

<br>

<div class="row">
	<div class="span12">

		<div class="row">
			<div class="span6">

				<div class="row">
					<div class="span6">
						<p class="text-info"><strong>Promedios mas altos</strong></p>
					</div>
				</div>

				<div class="row" width="100%">
					<div class="span6">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th width="80%">Nombre</th>
									<th width="20%">Promedio</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach ($altos as $alto) { ?>
								<tr>
									<td><?php echo $alto['nombre']; ?></td>
									<td><div class="text-center"><?php echo $alto['promedio']; ?></div></td>
								</tr>
							<?php 
							$i++;
							if($i==5) break;
							} ?>
							</tbody>
						</table>
					</div>
				</div>

			</div>
			<div class="span6">
				
				<div class="row">
					<div class="span6">
						<p class="text-info"><strong>Promedios mas bajos</strong></p>
					</div>
				</div>

				<div class="row" width="100%">
					<div class="span6">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th width="80%">Nombre</th>
									<th width="20%">Promedio</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach ($bajos as $bajo) { ?>
								<tr>
									<td><?php echo $bajo['nombre']; ?></td>
									<td><div class="text-center"><?php echo $bajo['promedio']; ?></div></td>
								</tr>
								<?php 
							$k++;
							if($k==5) break;
							} ?>
							</tbody>
						</table>
					</div>
				</div>

			</div>
		</div>

	</div>
</div>

<br>
<br>

<div class="row">
	<div class="span10 offset1">
		<canvas id="canvas"></canvas>
	</div>
</div>


<script type="text/javascript">
var promedios =<?php echo json_encode($promedios );?>;
var nombres =<?php echo json_encode($nombres );?>;

var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

var lineChartData = {
	//labels : ["January","February","March","April","May","June","July"],
	labels : nombres,
	datasets : [
		{
			label: "dataset",
			fillColor : "rgba(151,187,205,0.2)",
			strokeColor : "rgba(151,187,205,1)",
			pointColor : "rgba(151,187,205,1)",
			pointStrokeColor : "#fff",
			pointHighlightFill : "#fff",
			pointHighlightStroke : "rgba(151,187,205,1)",
			data : promedios,
		}
	]

};

window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: true,
			pointHitDetectionRadius: 2,
		});
	}
</script>

<?php 


?>