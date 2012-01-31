<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);

$this->menu = array(
		array('label'=>Yii::t('app', 'Listar') . ' ' . $model->label(2), 'url'=>array('index')),
		array('label'=>Yii::t('app', 'Agregar') . ' ' . $model->label(), 'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('orden-trabajo-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app', 'Administrar') . ' ' . GxHtml::encode($model->label(2)); ?></h1>

<?php echo GxHtml::link(Yii::t('app', 'Busqueda Avanzada'), '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'orden-trabajo-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
        'emptyText' => 'No hay resultados',
        'summaryText' => 'Mostrando del {start} al {end} de {count} resultado(s).',
        'pager' => array(
            'header'=>'',
            'prevPageLabel' => 'Anterior',
            'nextPageLabel' => 'Siguiente',
        ),
	'columns' => array(
		'nro_guia',
		array(
				'name'=>'id_vehiculo',
				'value'=>'GxHtml::valueEx($data->idVehiculo)',
				'filter'=>GxHtml::listDataEx(Vehiculos::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'id_rf',
				'value'=>'GxHtml::valueEx($data->idRf)',
				'filter'=>GxHtml::listDataEx(RegistroFactura::model()->findAllAttributes(null, true)),
				),
		'fecha',
		'kilometraje',
		/*
		'creado',
		'modificado',
		*/
		array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>