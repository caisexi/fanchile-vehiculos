<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Listar') . ' ' . $model->label(2), 'url'=>array('admin')),
	array('label'=>Yii::t('app', 'Agregar') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Editar') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Borrar') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
        array('label'=>Yii::t('app', 'Agregar') . ' ' . $model->getRelationLabel('ordenTrabajos'), 'url'=>array('ordentrabajo/create')),
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
        //'idVehiculo.patente',
        'fecha',
        'kilometraje',
        array(
            'header'=>'Subtotal',
            'value' => 'Vehiculos::formatearPeso($data->sumita)',
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
                'name'=>'Total Neto',
                'value' => Vehiculos::formatearPeso($model->total_bruto),
            ),
        ),
)); 
?>