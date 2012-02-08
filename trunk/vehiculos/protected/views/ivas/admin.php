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
	$.fn.yiiGridView.update('ivas-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app', 'Administrar') . ' ' . GxHtml::encode($model->label(2)); ?></h1>

<?php echo GxHtml::link(Yii::t('app', 'Busqueda Avanzada'), '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display: none">
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'ivas-grid',
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
		'fecha',
		'valor_iva',
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
                            'url'=>'Yii::app()->createUrl("ivas/view", array("id"=>$data->id))',
                            'imageUrl'=>Yii::app()->baseUrl . '/images/ver.png',
                        ),
                        'update' => array
                        (
                            'label'=>'Editar',
                            'url'=>'Yii::app()->createUrl("ivas/update", array("id"=>$data->id))',
                            'imageUrl'=>Yii::app()->baseUrl . '/images/editar.png',
                        ),
                        'delete' => array
                        (
                            'label'=>'Borrar',
                            'url'=>'Yii::app()->createUrl("ivas/delete", array("id"=>$data->id))',
                            'imageUrl'=>Yii::app()->baseUrl . '/images/delete.png',
                        ),
                    ),
                ), 
	),
)); ?>