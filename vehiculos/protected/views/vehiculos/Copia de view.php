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
			'name' => 'idCombustible0',
			'type' => 'raw',
			'value' => $model->idCombustible0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idCombustible0)), array('combustibles/view', 'id' => GxActiveRecord::extractPkValue($model->idCombustible0, true))) : null,
			),
array(
			'name' => 'idTipoVehiculo0',
			'type' => 'raw',
			'value' => $model->idTipoVehiculo0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idTipoVehiculo0)), array('tiposVehiculos/view', 'id' => GxActiveRecord::extractPkValue($model->idTipoVehiculo0, true))) : null,
			),
array(
			'name' => 'idProveedor0',
			'type' => 'raw',
			'value' => $model->idProveedor0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idProveedor0)), array('proveedores/view', 'id' => GxActiveRecord::extractPkValue($model->idProveedor0, true))) : null,
			),
array(
			'name' => 'idMarca0',
			'type' => 'raw',
			'value' => $model->idMarca0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idMarca0)), array('marcasVehiculos/view', 'id' => GxActiveRecord::extractPkValue($model->idMarca0, true))) : null,
			),
array(
			'name' => 'idModelo0',
			'type' => 'raw',
			'value' => $model->idModelo0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idModelo0)), array('modelosVehiculos/view', 'id' => GxActiveRecord::extractPkValue($model->idModelo0, true))) : null,
			),
array(
			'name' => 'idColor0',
			'type' => 'raw',
			'value' => $model->idColor0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idColor0)), array('coloresVehiculos/view', 'id' => GxActiveRecord::extractPkValue($model->idColor0, true))) : null,
			),
'ano',
'patente',
'precioCompra',
'creado',
'modificado',
	),
)); ?>

