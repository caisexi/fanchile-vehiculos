<?php

$this->breadcrumbs = array(
	RegistroFactura::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Agregar') . ' ' . RegistroFactura::label(), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Administrar') . ' ' . RegistroFactura::label(2), 'url' => array('admin')),
);
?>

<h1><?php echo GxHtml::encode(RegistroFactura::label(2)); ?></h1>

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