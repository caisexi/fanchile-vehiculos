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

<h1><?php echo GxHtml::encode($model->label()) . ' Patente N°: ' . '<font color="yellow">'.OrdenTrabajo::formatearPatente(GxHtml::encode(GxHtml::valueEx($model))).'</font>'; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
array(
			'name' => 'idCombustible0',
			'type' => 'raw',
			'value' => $model->idCombustible0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idCombustible0)), array('combustibles/view', 'id' => GxActiveRecord::extractPkValue($model->idCombustible0, true))) : null,
			),
array(
			'name' => 'idTipoVehiculo0',
			'type' => 'raw',
			'value' => $model->idTipoVehiculo0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idTipoVehiculo0)), array('tiposVehiculos/view', 'id' => GxActiveRecord::extractPkValue($model->idTipoVehiculo0, true))) : null,
			),
array(
			'name' => 'idProveedor0',
			'type' => 'raw',
			'value' => $model->idProveedor0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idProveedor0)), array('proveedores/view', 'id' => GxActiveRecord::extractPkValue($model->idProveedor0, true))) : null,
			),
array(
			'name' => 'idMarca0',
			'type' => 'raw',
			'value' => $model->idMarca0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idMarca0)), array('marcasVehiculos/view', 'id' => GxActiveRecord::extractPkValue($model->idMarca0, true))) : null,
			),
array(
			'name' => 'idModelo0',
			'type' => 'raw',
			'value' => $model->idModelo0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idModelo0)), array('modelosVehiculos/view', 'id' => GxActiveRecord::extractPkValue($model->idModelo0, true))) : null,
			),
array(
			'name' => 'idColor0',
			'type' => 'raw',
			'value' => $model->idColor0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->idColor0)), array('coloresVehiculos/view', 'id' => GxActiveRecord::extractPkValue($model->idColor0, true))) : null,
			),
array(
			'name' => 'precioCompra',
			'type' => 'raw',
			'value' => OrdenTrabajo::formatearPeso($model->precioCompra),
			),
array(
			'name' => 'Año',
			'type' => 'raw',
			'value' => $model->ano,
			),
array(
			'name' => 'estado',
			'type' => 'raw',
			'value' => $model->saberEstado($model->estado),
			),           
'creado',
'modificado',
	),
)); 

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'ordenesvh-grid',
    'summaryText' => 'Mostrando del {start} al {end} de {count} resultado(s).',
        'pager' => array(
            'header'=>'',
            'prevPageLabel' => 'Anterior',
            'nextPageLabel' => 'Siguiente',
        ),
    'dataProvider' => $dataProvider,
    'columns' => array(
        array(
            'name'=>'nro_factura',
            'value' => '$data->idRf->nro_factura',
            'htmlOptions'=>array('style' => 'text-align: right;'),
        ),
        array(
            'name'=>'Fecha Factura',
            'value' => '$data->idRf->fecha',
            'htmlOptions'=>array('style' => 'text-align: center;'),
        ),
        array(
            'name'=>'nro_guia',
            'value' => '$data->nro_guia',
            'htmlOptions'=>array('style' => 'text-align: right;'),
        ),
        array(
            'name'=>'Fecha Guia',
            'value' => '$data->fecha',
            'htmlOptions'=>array('style' => 'text-align: center;'),
        ),
        array(
            'header'=>'Kilometraje',
            'value' => 'OrdenTrabajo::formatearKm($data->kilometraje)',
            'htmlOptions'=>array('style' => 'text-align: right;'),
            ),
        array(
            'header'=>'Subtotal',
            'value' => 'OrdenTrabajo::formatearPeso($data->sumita)',
            'htmlOptions'=>array('style' => 'text-align: right;'),
        ),
        array(
            'class' => 'CButtonColumn',
            'header' => 'Opciones',
            'htmlOptions'=>array('width' => 120),
            'template'=>'{view}{update}{delete}',
            'buttons'=>array
            (
                'view' => array
                (
                    'label'=>'Ver',
                    'url'=>'Yii::app()->createUrl("ordentrabajo/view", array("id"=>$data->id))',
                    'imageUrl'=>Yii::app()->baseUrl . '/images/ver.png',
                ),
                'update' => array
                (
                    'label'=>'Editar',
                    'url'=>'Yii::app()->createUrl("ordentrabajo/update", array("id"=>$data->id))',
                    'imageUrl'=>Yii::app()->baseUrl . '/images/editar.png',
                ),
                'delete' => array
                (
                    'label'=>'Borrar',
                    'url'=>'Yii::app()->createUrl("ordentrabajo/delete", array("id"=>$data->id))',
                    'imageUrl'=>Yii::app()->baseUrl . '/images/delete.png',
                ),
            ),
        ),
    ),
));

$this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
            array(
                'name'=>'Gasto Acumulado',
                'value' => $model->sumarGasto(),
            ),
        ),
)); 
?>

