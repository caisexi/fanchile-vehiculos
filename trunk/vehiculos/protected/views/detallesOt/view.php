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
			'name' => 'idDetalleReparacion',
			'type' => 'raw',
			'value' => $model->idDetalleReparacion !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idDetalleReparacion)), array('detalleReparacion/view', 'id' => GxActiveRecord::extractPkValue($model->idDetalleReparacion, true))) : null,
			),
array(
			'name' => 'idOt',
			'type' => 'raw',
			'value' => $model->idOt !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idOt)), array('ordenTrabajo/view', 'id' => GxActiveRecord::extractPkValue($model->idOt, true))) : null,
			),
'cantidad',
array(
			'name' => 'idMarca',
			'type' => 'raw',
			'value' => $model->idMarca !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idMarca)), array('marcasRepuestos/view', 'id' => GxActiveRecord::extractPkValue($model->idMarca, true))) : null,
			),
'observacion',
'precio_unitario',
	),
)); ?>

