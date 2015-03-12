<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/edi-table.css">             
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/mindmup-editabletable.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/numeric-input-example.js"></script>

<div class="alert alert-error hide">
			That would cost too much
		</div>

<table id="mainTable" class="table table-hover">
            <thead>
            	<tr>
            		<th>Name</th>
            		<th>Cost</th>
            		<th>Profit</th>
            		<th>Fun</th>
            	</tr>
            </thead>
            <tbody>
              <tr><td data-editable= 'false'><strong>Car</strong></td><td>100</td><td>200</td><td>0</td></tr>
              <tr><td data-editable= 'false'>Bike</td><td>330</td><td>240</td><td>1</td></tr>
              <tr><td data-editable= 'false'>Plane</td><td>430</td><td>540</td><td>3</td></tr>
              <tr><td data-editable= 'false'>Yacht</td><td>100</td><td>200</td><td>0</td></tr>
              <tr><td data-editable= 'false'>Segway</td><td>330</td><td>240</td><td>1</td></tr>
            </tbody>
			<tfoot><tr><th><strong>TOTAL</strong></th><th></th><th></th><th></th></tr></thead>
          </table>


          <script>
  $('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
  $('#textAreaEditor').editableTableWidget({editor: $('<textarea>')});
  window.prettyPrint && prettyPrint();

</script>
