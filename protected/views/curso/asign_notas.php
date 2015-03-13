
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
                        <a href="#" onclick="ajax_notas(<?php echo $a->asi_id .", 1" ?>)">
                            <i class="icon-book"></i>  PRIMER SEMESTRE.</a><br>

                        <a  href="#" onclick="ajax_notas(<?php echo $a->asi_id .", 2" ?>)">
                            <i class="icon-book"></i>  SENGUNDO SEMESTRE.</a><br>

                    <?php } elseif ( $periodo == 'TRIMESTRE') { ?>
                        <a  href="#" onclick="ajax_notas(<?php echo $a->asi_id .", 1" ?>)">
                            <i class="icon-book"></i>  PRIMER TRIMESTRE.</a><br>

                        <a  href="#" onclick="ajax_notas(<?php echo $a->asi_id .", 2" ?>)">
                            <i class="icon-book"></i>  SEGUNDO TRIMESTRE.</a><br>

                        <a  href="#" onclick="ajax_notas(<?php echo $a->asi_id .", 3" ?>)">
                            <i class="icon-book"></i>  TERCER TRIMESTRE.</a><br>

                    <?php } ?>
                </div>
            </div>
           
        </div>
    <?php } ?>
</div>

<script>
    function ajax_notas(asi_id, tperiodo){
        var coco = [asi_id,tperiodo];
        var cur = <?php echo $cur_id; ?>;
        url = '<?php echo CController::createUrl("curso/poner_notas",array("a" =>'CK', "b" => 'JK', "c" => 'BK')); ?>';
        a = url.replace('CK',asi_id);
        b = a.replace('JK',tperiodo);
        c = b.replace('BK',cur);
        window.location.href = c;    
    }
</script>
