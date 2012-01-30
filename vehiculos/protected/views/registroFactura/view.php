<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
        array('label'=>Yii::t('app', 'Agregar') . ' ' . $model->getRelationLabel('ordenTrabajos', 1), 'url'=>array('ordentrabajo/create?factura='.$model->nro_factura.'&id='.$model->id)),
	array('label'=>Yii::t('app', 'Listar') . ' ' . $model->label(2), 'url'=>array('admin')),
	array('label'=>Yii::t('app', 'Agregar') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Editar') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Borrar') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1><?php echo GxHtml::encode($model->label()) . ' Numero: ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
            array(
                    'name' => 'idProveedor',
                    'type' => 'raw',
                    'value' => $model->idProveedor !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idProveedor)), array('proveedores/view', 'id' => GxActiveRecord::extractPkValue($model->idProveedor, true))) : null,
                    ),
                    'fecha',
                    'creado',
                    'modificado',
            ),
)); 

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'ordenes-grid',
    'summaryText'=>'', 
    'dataProvider' => $OrdenTrabajo,
    'columns' => array(
        'nro_guia',
        array(
            'header'=>'Patente',
            'value' => 'OrdenTrabajo::formatearPatente($data->idVehiculo->patente)',
        ),
        'fecha',
        array(
                'header'=>'Kilometraje',
                'value' => 'RegistroFactura::formatearKm($data->kilometraje)',
            ),
        array(
            'header'=>'Subtotal',
            'value' => 'Vehiculos::formatearPeso($data->sumita)',
            'htmlOptions'=>array('style' => 'text-align: right;'),
        ),
        array(
            'class' => 'CButtonColumn',
            'template'=>'{view}{update}',
            'buttons'=>array
            (
                'view' => array
                (
                    'label'=>'Ver',
                    'url'=>'Yii::app()->createUrl("ordentrabajo/view", array("id"=>$data->id))',
                ),
                'update' => array
                (
                    'label'=>'Editar',
                    'url'=>'Yii::app()->createUrl("ordentrabajo/update", array("id"=>$data->id))',
                ),
            ),
        ),
        
    ),
));

 $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
            array(
                'name'=>'Total Neto',
                'value' => Vehiculos::formatearPeso($model->total_neto),
            ),
            array(
                'name'=>'Total Bruto',
                'value' => Vehiculos::formatearPeso($model->total_bruto),
            ),
        ),
)); 
?>