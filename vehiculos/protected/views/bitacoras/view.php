<?php
$this->breadcrumbs=array(
	'Bitacoras'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Bitacoras', 'url'=>array('index')),
	array('label'=>'Agregar Bitacoras', 'url'=>array('create')),
	array('label'=>'Editar Bitacoras', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Bitacoras', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Bitacoras', 'url'=>array('admin')),
);
?>

<h1>Bitacoras #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'name' => 'idVehiculo',
			'type' => 'raw',
			'value' => $model->idVehiculo !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idVehiculo)), array('vehiculos/view', 'id' => GxActiveRecord::extractPkValue($model->idVehiculo, true))) : null,
			),
		'fecha',
		'kilometraje_inicial',
		'kilometraje_final',
		'litros_adicionales',
	),
)); ?>
