
<div class="form">
    <?php echo CHtml::beginForm(); ?>
 
        <div class="row">
            <?php echo CHtml::dropDownList('id_curso','id_curso',$cur ,array('empty' => '-Seleccione Curso-','id'=> 'id_curso')); ?>
        </div>
       
        <div class="row submit">
            <?php echo CHtml::submitButton('guardar'); ?>
        </div>
     
    <?php echo CHtml::endForm(); ?>
</div><!-- form -->
