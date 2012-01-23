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
'nro_guia',
array(
			'name' => 'idVehiculo',
			'type' => 'raw',
			'value' => $model->idVehiculo !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idVehiculo)), array('vehiculos/view', 'id' => GxActiveRecord::extractPkValue($model->idVehiculo, true))) : null,
			),
array(
			'name' => 'idRf',
			'type' => 'raw',
			'value' => $model->idRf !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idRf)), array('registroFactura/view', 'id' => GxActiveRecord::extractPkValue($model->idRf, true))) : null,
			),
'fecha',
'kilometraje',
'creado',
'modificado',
	),
)); ?>

<h2><?php echo GxHtml::encode($model->getRelationLabel('detallesOts')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->detallesOts as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('detallesOt/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>