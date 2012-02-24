<?php
$this->breadcrumbs=array(
	'Diesels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Diesel', 'url'=>array('index')),
	array('label'=>'Manage Diesel', 'url'=>array('admin')),
);
?>

<h1>Create Diesel</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>