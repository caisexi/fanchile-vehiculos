<?php
$this->breadcrumbs=array(
	'Bitacorases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Bitacoras', 'url'=>array('index')),
	array('label'=>'Create Bitacoras', 'url'=>array('create')),
	array('label'=>'View Bitacoras', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Bitacoras', 'url'=>array('admin')),
);
?>

<h1>Update Bitacoras <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>