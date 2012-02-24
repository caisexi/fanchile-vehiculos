<?php
$this->breadcrumbs=array(
	'Diesels'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Diesel', 'url'=>array('index')),
	array('label'=>'Create Diesel', 'url'=>array('create')),
	array('label'=>'View Diesel', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Diesel', 'url'=>array('admin')),
);
?>

<h1>Update Diesel <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>