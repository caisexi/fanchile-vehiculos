<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Agregar'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Listar') . ' ' . $model->label(2), 'url' => array('index')),
	array('label'=>Yii::t('app', 'Agregar') . ' ' . $model->label(2), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Agregar') . ' ' . GxHtml::encode($model->label()); ?></h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'buttons' => 'create'));
?>