<?php

$this->breadcrumbs = array(
	PlanillasCopec::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Agregar') . ' ' . PlanillasCopec::label(), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Administrar') . ' ' . PlanillasCopec::label(2), 'url' => array('admin')),
        array('label'=>Yii::t('app', 'Subir Planilla'), 'url'=>array('site/subir')),
);
?>

<h1><?php echo GxHtml::encode(PlanillasCopec::label(2)); ?></h1>

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