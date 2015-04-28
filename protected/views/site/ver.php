<?php
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'summaryText'=>'',
	'itemView'=>'//noticia/_view',
));
?>