<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'summaryText'=>'', 
    'dataProvider' => $dataProvider,
    'columns' => array(
        array(
            'name'=>'Patente',
            'value' => 'OrdenTrabajo::formatearPatente($data["patente"])',
            'htmlOptions'=>array('width' => '60'),
        ),
        array(
            'name'=>'Tipo de Vehiculo',
            'value' => '$data["nombretipovehiculo"]',
        ),
        array(
            'name'=>'Nombre Usuario',
            'value' => '$data["nombrepersonal"]',
        ),
        array(
            'name'=>'Apellido Usuario',
            'value' => '$data["apellido_pat"]',
        ),
        array(
            'name'=>'Area',
            'value' => '$data["nombreareaempresa"]',
        ),
        array(
            'name'=>'Total Reparaciones',
            'value' => 'OrdenTrabajo::formatearPeso($data["reparaciones"])',
            'htmlOptions'=>array('style' => 'text-align: right;'),
        ),
        array(
            'name'=>'Total Acumulado',
            'value' => 'OrdenTrabajo::formatearPeso($data["gastoAcumulado"])',
            'htmlOptions'=>array('style' => 'text-align: right;'),
        ),
        array(
            'name'=>'Recorrido Parcial',
            'value' => 'OrdenTrabajo::formatearKm($data["recorrido"])',
            'htmlOptions'=>array('style' => 'text-align: right;'),
        ),
        array(
            'name'=>'Pesos/Km',
            'value' => '$data["pesoskm"]',
        ),
    ),
));
?>
