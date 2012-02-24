<?php
$this->breadcrumbs=array(
	'Diesels'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Diesel', 'url'=>array('index')),
	array('label'=>'Create Diesel', 'url'=>array('create')),
	array('label'=>'Update Diesel', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Diesel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Diesel', 'url'=>array('admin')),
);
?>

<h1>View Diesel #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_planilla',
		'id_vehiculo',
		'nro_factura',
		'fecha',
		'region',
		'estacion',
		'litros',
		'precio_u',
		'especifico',
		'variable',
		'total',
		'nro_guia',
		'rollo',
	),
)); ?>
