<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Agregar') . ' ' . $model->label(), 'url'=>array('create?factura='.$model->idRf.'&id='.$model->id_rf)),
        array('label'=>Yii::t('app', 'Listar') . ' ' . $model->label(2), 'url'=>array('index')),	
	array('label'=>Yii::t('app', 'Editar') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Borrar') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Administrar') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo GxHtml::encode($model->label()) . ' Nro.° ' . "<font color='yellow'>".GxHtml::encode(GxHtml::valueEx($model))."</font>"; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
array(
			'name' => 'idVehiculo',
			'type' => 'raw',
			'value' => $model->idVehiculo !== null ? GxHtml::link(OrdenTrabajo::formatearPatente($model->idVehiculo), array('vehiculos/view', 'id' => GxActiveRecord::extractPkValue($model->idVehiculo, true))) : null,
			),
array(
			'name' => 'idRf',
			'type' => 'raw',
			'value' => $model->idRf !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idRf)), array('registroFactura/view', 'id' => GxActiveRecord::extractPkValue($model->idRf, true))) : null,
			),
array(
			'name' => 'kilometraje',
			'type' => 'raw',
			'value' => OrdenTrabajo::formatearKm($model->kilometraje),
			),            
'fecha',
'creado',
'modificado',
	),
)); 
$mazo = 1;
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'detallesOt-grid',
    'summaryText'=>'', 
    'dataProvider' => $detOt,
    'columns' => array(
        array(
            'name'=>'id_detalle_reparacion',
            'value' => '$data->idDetalleReparacion == null ? null : $data->idDetalleReparacion->nombre',
        ),
        array(
            'name'=>'id_marca',
            'value' => '$data->idMarca == null ? null : $data->idMarca->nombre',
        ),  
        array(
            'name'=>'cantidad',
            'value' => '$data->cantidad',
            'htmlOptions'=>array('style' => 'text-align: right;'),
        ),
        array(
            'name'=>'precio_unitario',
            'value' => 'OrdenTrabajo::formatearPeso($data->precio_unitario)',
            'htmlOptions'=>array('style' => 'text-align: right;'),
        ),
        array(
            'name'=>'subtotal',
            'value' => 'OrdenTrabajo::formatearPeso($data->subtotal)',
            'htmlOptions'=>array('style' => 'text-align: right;'),
        ),
        array(
            'name'=>'observacion',
            'value' => '$data->observacion',
        ),
    ),
));
 
?>