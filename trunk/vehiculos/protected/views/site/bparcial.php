<?php

$this->breadcrumbs = array(Yii::t('app', 'Resumen Parcial'));

$this->menu = array(
        array('label'=>'PDF', 'url'=>array('site/bparcial?pdf=1&save=0&fecha_inicial='.$fechainicial.'&fecha_termino='.$fechafinal)),
        array('label'=>'SAVE', 'url'=>array('site/bparcial?pdf=1&save=1&fecha_inicial='.$fechainicial.'&fecha_termino='.$fechafinal)),
    );

?>

<h2>RESUMEN PARCIAL DE MANTENCION DE VEHICULOS DESDE EL <?php echo date('d-m-Y',strtotime($fechainicial)); ?> HASTA EL <?php echo date('d-m-Y',strtotime($fechafinal)) ?></h2>
<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'summaryText'=>'', 
    'dataProvider' => $dataProvider,
    'columns' => array(
        array(
            'name'=>'Patente',
            'value' => 'OrdenTrabajo::formatearPatente($data["patente"])',
            'htmlOptions'=>array('width' => '100'),
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