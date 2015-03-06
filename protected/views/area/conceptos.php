<?php
//var_dump($area);
?>

<h1>Areas</h1>

<div class="accordion" id="accordion2">
<?php foreach ($area as $key => $value) {?>
  <div class="accordion-group">
    <div class="accordion-heading">
      	<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse<?php echo $value->are_id; ?>">
        	<?php echo $value->are_descripcion; ?>
      	</a>
    </div>
    <div id="collapse<?php echo $value->are_id; ?>" class="accordion-body collapse">
      	<div class="accordion-inner">
                <table>
                  <thead>
                    <tr>
                      <th>Concepto</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php 
                    for ($k=0; $k < count($con); $k++) { 
                      if($value->are_id==$con[$k]->con_area){
                        ?>
                    <tr>
                      <td><?php echo $con[$k]->con_descripcion; ?></td>
                      <td><i class="icon-plus"></i><i class="icon-minus"></i></td>
                    </tr>
                    <?php  
                        } 
                      }
                    ?> 

                  </tbody>
                </table>    
      	</div>
    </div>
  </div>
<?php } ?>
</div>

<script type="text/javascript">
 

</script>