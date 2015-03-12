

<div class="accordion" id="accordion2">
    <?php foreach ($asig as $key=>$a) { ?>
        <div class="accordion-group">
    
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse<?php echo $key?>">
                    <?php  echo $a->asi_descripcion;  ?>
                </a>
            </div>

            <div id="collapse<?php echo $key?>" class="accordion-body collapse">
                <div class="accordion-inner">
                    <?php if( $periodo == 'SEMESTRE'){ ?>
                        <a href="#"><i class="icon-book"></i>  PRIMER SEMESTRE.</a><br>
                        <a href="#"><i class="icon-book"></i>  SENGUNDO SEMESTRE.</a><br>

                    <?php } elseif ( $periodo == 'TRIMESTRE') { ?>
                        <a href="#"><i class="icon-book"></i>  PRIMER TRIMESTRE.</a><br>
                        <a href="#"><i class="icon-book"></i>  SEGUNDO TRIMESTRE.</a><br>
                        <a href="#"><i class="icon-book"></i>  TERCER TRIMESTRE.</a><br>

                    <?php } ?>
                </div>
            </div>
           
        </div>
    <?php } ?>
</div>


