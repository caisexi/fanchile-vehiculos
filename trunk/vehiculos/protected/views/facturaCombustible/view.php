<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Listar') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Agregar') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Editar') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Borrar') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Administrar') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'nro_factura',
'fecha',
array(
			'name' => 'idCombustible',
			'type' => 'raw',
			'value' => $model->idCombustible !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idCombustible)), array('combustibles/view', 'id' => GxActiveRecord::extractPkValue($model->idCombustible, true))) : null,
			),
'neto',
'iva',
'especifico',
'litros',
'total',
'valor_lt',
'valor_guia',
'creado',
'modificado',
	),
)); 

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'ordenes-grid',
    'summaryText'=>'', 
    'dataProvider' => $DetFacturaCombustible,
    'columns' => array(
        array(
            'name'=>'nro_guia',
            'value' => '$data->nro_guia',
            'htmlOptions'=>array('style' => 'text-align: right;'),
        ),        
        array(
            'header'=>'Patente',
            'value' => 'OrdenTrabajo::formatearPatente($data->idVehiculo->patente)',
            'htmlOptions'=>array('style' => 'text-align: center;'),
        ),
        array(
            'header'=>'Litros',
            'value' => '$data->litros',
            'htmlOptions'=>array('style' => 'text-align: right;'),
        ),
    ),
));
?>
