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
        array('label'=>Yii::t('app', 'Subir Planilla'), 'url'=>array('site/subir')),
);
?>

<h1><?php echo 'Planilla '.($tipo == 1 ? 'Gasolina ' : 'Diesel ').'<font color="yellow">'.GxHtml::encode(GxHtml::valueEx($model)).'</font>'; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
array(
			'name' => 'tipo_planilla',
			'type' => 'raw',
			'value' => $model->tipo_planilla == 1 ? 'Gasolina':'Diesel',
			),
'creado',
'modificado',
	),
)); 

if($tipo == 1)
{
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'detallesOt-grid',
        'dataProvider' => $dataProvider,
        'emptyText' => 'No hay resultados',
        'summaryText' => 'Mostrando del {start} al {end} de {count} resultado(s).',
        'pager' => array(
            'header'=>'',
            'prevPageLabel' => 'Anterior',
            'nextPageLabel' => 'Siguiente',
        ),
        'columns' => array(
            array(
              'name' => 'id_vehiculo',
              'type' => 'raw',
              'value' => 'CHtml::link(OrdenTrabajo::formatearPatente($data->idVehiculo),"/vehiculos/index.php/vehiculos/".$data->idVehiculo->id)'
            ),
            array(
                'name'=>'tarjeta',
                'value' => '$data->tarjeta == null ? null : $data->tarjeta',
            ),            
            array(
                'name'=>'fecha',
                'value' => '$data->fecha == null ? null : $data->fecha',
                'htmlOptions'=>array('style' => 'width:65px'),
            ),
            array(
                'name'=>'hora',
                'value' => '$data->hora == null ? null : $data->hora',
            ),
            array(
                'name'=>'comuna',
                'value' => '$data->comuna == null ? null : $data->comuna',
            ),
            array(
                'name'=>'direccion',
                'value' => '$data->direccion == null ? null : $data->direccion',
                'htmlOptions'=>array('style' => 'width:150px'),
            ),
            array(
                'name'=>'precio_u',
                'value' => 'OrdenTrabajo::formatearPeso($data->precio_u)',
                'htmlOptions'=>array('style' => 'text-align: right;'),
            ),
            array(
                'name'=>'litros',
                'value' => '$data->litros == null ? null : $data->litros',
            ),
            array(
                'name'=>'total',
                'value' => 'OrdenTrabajo::formatearPeso($data->total)',
                'htmlOptions'=>array('style' => 'text-align: right;'),
            ),
            array(
                'name'=>'costo_empresa',
                'value' => 'OrdenTrabajo::formatearPeso($data->costo_empresa)',
                'htmlOptions'=>array('style' => 'text-align: right;'),
            ),
        ),
    ));
}
elseif($tipo == 0)
{
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'detallesOt-grid',
        'dataProvider' => $dataProvider,
        'emptyText' => 'No hay resultados',
        'summaryText' => 'Mostrando del {start} al {end} de {count} resultado(s).',
        'pager' => array(
            'header'=>'',
            'prevPageLabel' => 'Anterior',
            'nextPageLabel' => 'Siguiente',
        ),
        'columns' => array(
            array(
              'name' => 'id_vehiculo',
              'type' => 'raw',
              'value' => 'CHtml::link(OrdenTrabajo::formatearPatente($data->idVehiculo),"/vehiculos/index.php/vehiculos/".$data->idVehiculo->id)'
            ),
            array(
                'name'=>'nro_factura',
                'value' => '$data->nro_factura == null ? null : $data->nro_factura',
            ),  
            array(
                'name'=>'fecha',
                'value' => '$data->fecha',
            ),
            array(
                'name'=>'estacion',
                'value' => '$data->estacion',
                'htmlOptions'=>array('style' => 'width:100px'),
            ),
            array(
                'name'=>'litros',
                'value' => '$data->litros',
            ),
            array(
                'name'=>'precio_u',
                'value' => 'OrdenTrabajo::formatearPeso($data->precio_u)',
                'htmlOptions'=>array('style' => 'text-align: right;'),
            ),
            array(
                'name'=>'especifico',
                'value' => 'OrdenTrabajo::formatearPeso($data->especifico)',
                'htmlOptions'=>array('style' => 'text-align: right;'),
            ),
            array(
                'name'=>'costo_empresa',
                'value' => 'OrdenTrabajo::formatearPeso($data->costo_empresa)',
                'htmlOptions'=>array('style' => 'text-align: right;'),
            ),
            array(
                'name'=>'total',
                'value' => 'OrdenTrabajo::formatearPeso($data->total)',
                'htmlOptions'=>array('style' => 'text-align: right;'),
            ),
            array(
                'name'=>'nro_guia',
                'value' => '$data->nro_guia == null ? null : $data->nro_guia',
            ), 
        ),
    ));
}
?>

