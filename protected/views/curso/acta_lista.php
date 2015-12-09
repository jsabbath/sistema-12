<div class="row">
	<div class="span12 text-center">
		<h2>Acta de Calificaciones</h2>

        <p class="text-info">Seleccione el <strong>Curso</strong> que desea <strong>Imprimir</strong></p>

        <form method="POST" action="<?php echo CController::createUrl("Notas/acta_informe"); ?>">
            <?php echo CHtml::dropDownList('id_curso','id_curso',$cur ,array(
                                             'empty' => '-Seleccione Curso-',
                                             'id'=> 'id_curso',
                                         ));?>
            <div>
                <button class="btn btn-success" id="curso_print">Generar</button>
            </div>
        </form>



	</div>

</div>
