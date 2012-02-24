<?php
$this->breadcrumbs=array(
	'Diesels',
);

$this->menu=array(
	array('label'=>'Create Diesel', 'url'=>array('create')),
	array('label'=>'Manage Diesel', 'url'=>array('admin')),
);
?>

<h1>Diesels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
