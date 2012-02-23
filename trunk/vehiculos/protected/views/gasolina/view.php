<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'id',
array(
			'name' => 'idPlanilla',
			'type' => 'raw',
			'value' => $model->idPlanilla !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idPlanilla)), array('planillasCopec/view', 'id' => GxActiveRecord::extractPkValue($model->idPlanilla, true))) : null,
			),
array(
			'name' => 'idVehiculo',
			'type' => 'raw',
			'value' => $model->idVehiculo !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idVehiculo)), array('vehiculos/view', 'id' => GxActiveRecord::extractPkValue($model->idVehiculo, true))) : null,
			),
'tarjeta',
'fecha',
'hora',
'comuna',
'direccion',
'nro_transaccion',
'precio_u',
'litros',
'total',
	),
)); ?>

