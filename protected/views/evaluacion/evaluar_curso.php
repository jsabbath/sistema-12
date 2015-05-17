<style>
    #ajaxloader1
    {
        background-color: black;
     
        position: relative;
        width: 15px;
        height: 15px;
        left: 50%;
        top: 15%;
        margin: 0 0 0 -15px;
        border: 8px solid #fff;
        border-right-color: transparent;
        border-radius: 50%;
        box-shadow: 0 0 25px 2px #eee;
        -webkit-animation: spin 1s linear infinite;
        -moz-animation: spin 1s linear infinite;
        -ms-animation: spin 1s linear infinite;
        -o-animation: spin 1s linear infinite;
        animation: spin 1s linear infinite;
    }

    @-webkit-keyframes spin
    {
        from { -webkit-transform: rotate(0deg); opacity: 0.4; }
        50%  { -webkit-transform: rotate(180deg); opacity: 1; }
        to   { -webkit-transform: rotate(360deg); opacity: 0.4; }
    }

    @-moz-keyframes spin
    {
        from { -moz-transform: rotate(0deg); opacity: 0.4; }
        50%  { -moz-transform: rotate(180deg); opacity: 1; }
        to   { -moz-transform: rotate(360deg); opacity: 0.4; }
    }

    @-ms-keyframes spin
    {
        from { -ms-transform: rotate(0deg); opacity: 0.4; }
        50%  { -ms-transform: rotate(180deg); opacity: 1; }
        to   { -ms-transform: rotate(360deg); opacity: 0.4; }
    }

    @-o-keyframes spin
    {
        from { -o-transform: rotate(0deg); opacity: 0.4; }
        50%  { -o-transform: rotate(180deg); opacity: 1; }
        to   { -o-transform: rotate(360deg); opacity: 0.4; }
    }

    @keyframes spin
    {
        from { transform: rotate(0deg); opacity: 0.2; }
        50%  { transform: rotate(180deg); opacity: 1; }
        to   { transform: rotate(360deg); opacity: 0.2; }
    }
</style>










<div class="row">
  <div class="span12">
    <br>
	<?php 
        if( Yii::app()->user->checkAccess('admin')) $nombre = "admin"; 
    ?>

    <div class="text-center">
    <h4>Cursos de: <?php if( $nombre )echo $nombre; ?></h4>

<?php  
    
    if(empty( $cur )){
        echo "Usted no tiene cursos en  este año.";
    }else{
        echo CHtml::dropDownList('cur_id','cur_id',$cur ,array('empty' => '-Seleccione Curso-',
                                                                'id'=> 'drop_curso',
                                                               'name' => 'drop_curso')); 
}?>
    </div>

    <div  id="ajaxloader1"></div>
       
    <div class="row">
        <div class="span8 offset2">
		  	<div id="lista" hidden>
		  	</div>
	</div>
    </div>

 
<br>

    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('#drop_curso').change( function() {

            $.ajax({
                    url: '<?php echo CController::createUrl("evaluacion/curso_lista")?>',
                    type: "POST", 
                    data: {id: $(this).val() },
                    success: function(response) { 
                        $('#lista').html(response); 
                        $('#lista').show();

                        // $('#guardar_eva').on( "click", function(){
                        //     var n = $( "input:checked" ).length;
                        //     console.log($( "div" ).text( n + (n === 1 ? " is" : " are") + " checked!" ));
                        // } );

                       
                    }
            })
        })
    });
 

    var $loading = $('#ajaxloader1').hide();

    $(document)
      .ajaxStart(function () {
        $loading.show();
      })
      .ajaxStop(function () {
        $loading.hide();
      });


</script>


<script>
var spinner = [], a = document.getElementsByTagName("a");
for (var i=0; i < a.length; i++) {
    if (a[i].hash) {
        var n = document.getElementById(a[i].hash.substring(1));
        if (n) {
            spinner.push(n);
            a[i].onclick = function(e) {
                var t = (e ? e.target : window.event.srcElement);
                for (var i=0; i<spinner.length; i++) {
                    spinner[i].style.display = (spinner[i].id == t.hash.substring(1) ? "block" : "none");
                }
                return false;       
            };
        }
    }
}
</script>
