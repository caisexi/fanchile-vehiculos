<?php
$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Administrar'),
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
	$.fn.yiiGridView.update('vehiculos-grid', {
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
	'id' => 'vehiculos-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
        'summaryText' => 'Mostrando del {start} al {end} de {count} resultado(s).',
        'pager' => array(
            'header'=>'',
            'prevPageLabel' => 'Anterior',
            'nextPageLabel' => 'Siguiente',
        ),
	'columns' => array(
                array(
				'name'=>'patente',
				'value'=>'$data->patente',
                                'htmlOptions' => array('width' => '60')
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
                                'htmlOptions' => array('width' => '80')
				),
		array(
				'name'=>'ano',
				'value'=>'$data->ano',
                                'htmlOptions' => array('width' => '50')
				),
                array(
				'name'=>'estado',
				'value'=>'$data->estado == 1 ? "EN USO" : ($data->estado == 0 ? "EN VENTA" : "VENDIDO")',
				'filter'=>array(1 =>'EN USO',0 => 'EN VENTA',2 => 'VENDIDO'),
				),
		
		array(
                    'class' => 'CButtonColumn',
                    'header' => 'Opciones',
                    'htmlOptions'=>array('width' => 100),
                    'template'=>'{view}{update}{delete}',
                    'buttons'=>array
                    (
                        'view' => array
                        (
                            'label'=>'Ver',
                            'url'=>'Yii::app()->createUrl("vehiculos/view", array("id"=>$data->id))',
                            'imageUrl'=>Yii::app()->baseUrl . '/images/ver.png',
                        ),
                        'update' => array
                        (
                            'label'=>'Editar',
                            'url'=>'Yii::app()->createUrl("vehiculos/update", array("id"=>$data->id))',
                            'imageUrl'=>Yii::app()->baseUrl . '/images/editar.png',
                        ),
                        'delete' => array
                        (
                            'label'=>'Borrar',
                            'url'=>'Yii::app()->createUrl("vehiculos/delete", array("id"=>$data->id))',
                            'imageUrl'=>Yii::app()->baseUrl . '/images/delete.png',
                        ),
                    ),
                ), 
	),
)); ?>