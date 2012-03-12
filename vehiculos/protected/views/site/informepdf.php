<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'summaryText'=>'', 
    'dataProvider' => $dataProvider,
    'columns' => array(
            array(
                'name'=>'Area',
                'value' => '$data["area"]',
            ),         
            array(
                'name'=>'Nombre Usuario',
                'value' => '$data["nombre"]',
            ),
            array(
                'name'=>'Apellido Usuario',
                'value' => '$data["apellido_pat"]',
            ),
            array(
                'name'=>'Patente',
                'value' => 'OrdenTrabajo::formatearPatente($data["patente"])',
                'htmlOptions'=>array('width' => '100'),
            ),
            array(
                'name'=>'Total Litros',
                'value' => '$data["totallitros"]',
                'htmlOptions'=>array('style' => 'text-align: center;'),
            ),
            array(
                'name'=>'Neto',
                'value' => 'OrdenTrabajo::formatearPeso($data["neto"])',
                'htmlOptions'=>array('style' => 'text-align: right;'),
            ),
            array(
                'name'=>'Iva',
                'value' => 'OrdenTrabajo::formatearPeso($data["iva"])',
                'htmlOptions'=>array('style' => 'text-align: right;'),
            ),
            array(
                'name'=>'Impuesto Especifico',
                'value' => 'OrdenTrabajo::formatearPeso($data["costoespecifico"])',
                'htmlOptions'=>array('style' => 'text-align: right;'),
            ),
            array(
                'name'=>'Costo Empresa',
                'value' => 'OrdenTrabajo::formatearPeso($data["costoempresa"])',
                'htmlOptions'=>array('style' => 'text-align: right;'),
            ),
    ),
));

$this->widget('zii.widgets.grid.CGridView', array(
        'summaryText'=>'',
        'emptyText' => 'No hay resultados',
        'dataProvider' => $dataProvider2,
        'columns' => array(
            array(
                'name'=>'Area',
                'value' => '$data["area"]',
            ),         
            array(
                'name'=>'Total Litros',
                'value' => '$data["totallitros"]',
                'htmlOptions'=>array('style' => 'text-align: center;'),
            ),
            array(
                'name'=>'Neto',
                'value' => 'OrdenTrabajo::formatearPeso($data["neto"])',
                'htmlOptions'=>array('style' => 'text-align: right;'),
            ),
            array(
                'name'=>'Iva',
                'value' => 'OrdenTrabajo::formatearPeso($data["iva"])',
                'htmlOptions'=>array('style' => 'text-align: right;'),
            ),
            array(
                'name'=>'Impuesto Especifico',
                'value' => 'OrdenTrabajo::formatearPeso($data["costoespecifico"])',
                'htmlOptions'=>array('style' => 'text-align: right;'),
            ),
            array(
                'name'=>'Costo Empresa',
                'value' => 'OrdenTrabajo::formatearPeso($data["costoempresa"])',
                'htmlOptions'=>array('style' => 'text-align: right;'),
            ),
        ),
    ));

?>