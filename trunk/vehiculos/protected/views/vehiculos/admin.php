<?php
$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);

$this->menu = array(
		array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
		array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('vehiculos-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>

<?php echo GxHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'vehiculos-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
                //'patente',
                array(
				'name'=>'patente',
				'value'=>$model->patente,
				//'filter'=>GxHtml::listDataEx(MarcasVehiculos::model()->findAllAttributes(null, true)),
				),
                array(
				'name'=>'idMarca',
				'value'=>'GxHtml::valueEx($data->idMarca0)',
				'filter'=>GxHtml::listDataEx(MarcasVehiculos::model()->findAllAttributes(null, true)),
				),
                array(
				'name'=>'idModelo',
				'value'=>'GxHtml::valueEx($data->idModelo0)',
				'filter'=>GxHtml::listDataEx(ModelosVehiculos::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'idTipoVehiculo',
				'value'=>'GxHtml::valueEx($data->idTipoVehiculo0)',
				'filter'=>GxHtml::listDataEx(TiposVehiculos::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'idColor',
				'value'=>'GxHtml::valueEx($data->idColor0)',
				'filter'=>GxHtml::listDataEx(ColoresVehiculos::model()->findAllAttributes(null, true)),
				),
		'ano',
		
		array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>