<?php
$this->breadcrumbs=array(
	'Bitacoras',
);

$this->menu=array(
	array('label'=>'Agregar Bitacoras', 'url'=>array('create')),
	array('label'=>'Administrar Bitacoras', 'url'=>array('admin')),
);
?>

<h1>Bitacorases</h1>

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
)); ?>
