<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/fullcalendar.css">

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/moment.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/fullcalendar.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/lang-all.js"></script>


<style type="text/css">
	.closon {
		position: absolute;
		top: -2px;
		right: 0;
		cursor: pointer;
        background-color: #FFF
	}

.fc-event-container {
		position: relative;
	}
</style>

<script>

$(document).ready(function() {
	
$('#calendar').fullCalendar({
	header: {
		left: 'prev,next today',
		center: '',
		right: 'title'
	},
	firstDay: 1,
	lang: 'es',
	defaultDate: Date.now(),
	selectable: true,
	selectHelper: true,
	select: function(start, end) {
		var title = prompt('Titulo del evento:');
		var eventData;
		if (title) {
			var inicio = $.fullCalendar.moment(start).format();
   			var fin = $.fullCalendar.moment(end).format();

			$.ajax({
				url: '<?php echo $this->createUrl('Evento/insertar'); ?>',
	    		dataType: "json",
	    		type: "POST",
	    		data: 'title=' + title + '&start=' + inicio + '&end=' + fin,
	    		success: function (json) {
                    alert('Added Successfully');
                }
	    	})

			eventData = {
				title: title,
				start: start,
				end: end
			};
			
			$('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
		}
		$('#calendar').fullCalendar('unselect');
	},
	editable: true,
	eventLimit: true, // allow "more" link when too many events
	eventRender: function(event, element) {
        element.append( "<i class='closeon'>Eliminar</i>" );
        element.find(".closeon").click(function() {
           $('#calendar').fullCalendar('removeEvents',event._id);
        });
        //ajax de eliminacion
    },
	events: [
		//ajax de consulta de eventos
		//{
		//	title: 'Long Event',
		//	start: '2015-02-07',
		//	end: '2015-02-10'
		//},
	],
});
	
});
asdasdasd
</script>

<div class="row">
	<div class="span12 text-center">
		<h2>Mis Eventos</h2>
	</div>
</div>

<div id='calendar'></div>



<script type="text/javascript">
	
function insertar(evento){
	$.ajax({
	    url: '<?php echo $this->createUrl('Evento/insertar'); ?>',
	    dataType: "json",
	    data: { term: evento },
	    success: function() {
            alert("se ha insertado")
	    }
	})
}

</script>