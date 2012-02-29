<?php
$this->breadcrumbs=array(
	'Bitacorases'=>array('index'),
	'Agregar',
);

$this->menu=array(
	array('label'=>'Listar Bitacoras', 'url'=>array('index')),
	array('label'=>'Administrar Bitacoras', 'url'=>array('admin')),
);
?>

<h1>Agregar Bitacoras</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>