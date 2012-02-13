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
	$.fn.yiiGridView.update('factura-combustible-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app', 'Administrar') . ' ' . GxHtml::encode($model->label(2)); ?></h1>

<p>
You may optionally enter a comparison operator (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt; or =) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo GxHtml::link(Yii::t('app', 'Busqueda Avanzada'), '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display: none">
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'factura-combustible-grid',
	'dataProvider' => $model->search(),
        'emptyText' => 'No hay resultados',
        'summaryText' => 'Mostrando del {start} al {end} de {count} resultado(s).',
        'pager' => array(
            'header'=>'',
            'prevPageLabel' => 'Anterior',
            'nextPageLabel' => 'Siguiente',
        ),
	'filter' => $model,
	'columns' => array(
		'id',
		'nro_factura',
		'fecha',
		array(
				'name'=>'id_combustible',
				'value'=>'GxHtml::valueEx($data->idCombustible)',
				'filter'=>GxHtml::listDataEx(Combustibles::model()->findAllAttributes(null, true)),
				),
		'neto',
		'iva',
		/*
		'especifico',
		'litros',
		'total',
		'valor_lt',
		'valor_guia',
		'creado',
		'modificado',
		*/
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
                            'url'=>'Yii::app()->createUrl("combustibles/view", array("id"=>$data->id))',
                            'imageUrl'=>Yii::app()->baseUrl . '/images/ver.png',
                        ),
                        'update' => array
                        (
                            'label'=>'Editar',
                            'url'=>'Yii::app()->createUrl("combustibles/update", array("id"=>$data->id))',
                            'imageUrl'=>Yii::app()->baseUrl . '/images/editar.png',
                        ),
                        'delete' => array
                        (
                            'label'=>'Borrar',
                            'url'=>'Yii::app()->createUrl("combustibles/delete", array("id"=>$data->id))',
                            'imageUrl'=>Yii::app()->baseUrl . '/images/delete.png',
                        ),
                    ),
                ),
	),
)); ?>