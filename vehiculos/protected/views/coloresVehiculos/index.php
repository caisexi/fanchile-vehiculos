<?php

$this->breadcrumbs = array(
	ColoresVehiculos::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Agregar') . ' ' . ColoresVehiculos::label(), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Administrar') . ' ' . ColoresVehiculos::label(2), 'url' => array('admin')),
);
?>

<h1><?php echo GxHtml::encode(ColoresVehiculos::label(2)); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
        'emptyText' => 'No hay resultados',
        'summaryText' => 'Mostrando del {start} al {end} de {count} resultado(s).',
        'pager' => array(
            'header'=>'',
            'prevPageLabel' => 'Anterior',
            'nextPageLabel' => 'Siguiente',
        ),
	'itemView'=>'_view',
)); 