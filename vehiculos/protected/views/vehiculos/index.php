<?php

$this->breadcrumbs = array(
	Vehiculos::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Agregar') . ' ' . Vehiculos::label(), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Administrar') . ' ' . Vehiculos::label(2), 'url' => array('admin')),
);
?>

<h1><?php echo GxHtml::encode(Vehiculos::label(2)); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
        'summaryText' => 'Mostrando del {start} al {end} de {count} resultado(s).',
        'pager' => array(
            'header'=>'',
            'prevPageLabel' => 'Anterior',
            'nextPageLabel' => 'Siguiente',
        ),
)); 