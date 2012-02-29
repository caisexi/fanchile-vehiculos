<?php
$this->breadcrumbs=array(
	'Bitacorases'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Listar Bitacoras', 'url'=>array('index')),
	array('label'=>'Agregar Bitacoras', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('bitacoras-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Bitacoras</h1>

<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'bitacoras-grid',
	'dataProvider'=>$model->search(),
        'emptyText' => 'No hay resultados',
        'summaryText' => 'Mostrando del {start} al {end} de {count} resultado(s).',
        'pager' => array(
            'header'=>'',
            'prevPageLabel' => 'Anterior',
            'nextPageLabel' => 'Siguiente',
        ),
	'filter'=>$model,
	'columns'=>array(
		array(
				'name'=>'id_vehiculo',
				'value'=>'GxHtml::valueEx($data->idVehiculo)',
				'filter'=>GxHtml::listDataEx(Vehiculos::model()->findAllAttributes(null, true)),
                                'htmlOptions' => array('width' => '85'),
				),
		'fecha',
		'kilometraje_inicial',
		'kilometraje_final',
		'litros_adicionales',
		array(
                    'class' => 'CButtonColumn',
                    'header' => 'Opciones',
                    'htmlOptions'=>array('width' => 120),
                    'template'=>'{view}{update}{delete}',
                    'buttons'=>array
                    (
                        'view' => array
                        (
                            'label'=>'Ver',
                            'url'=>'Yii::app()->createUrl("bitacoras/view", array("id"=>$data->id))',
                            'imageUrl'=>Yii::app()->baseUrl . '/images/ver.png',
                        ),
                        'update' => array
                        (
                            'label'=>'Editar',
                            'url'=>'Yii::app()->createUrl("bitacoras/update", array("id"=>$data->id))',
                            'imageUrl'=>Yii::app()->baseUrl . '/images/editar.png',
                        ),
                        'delete' => array
                        (
                            'label'=>'Borrar',
                            'url'=>'Yii::app()->createUrl("bitacoras/delete", array("id"=>$data->id))',
                            'imageUrl'=>Yii::app()->baseUrl . '/images/delete.png',
                        ),
                    ),
                ), 
	),
)); ?>
