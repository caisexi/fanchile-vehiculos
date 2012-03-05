<?php
/*
$data = $dataProvider->getData();
echo '<table id="yw0" class="detail-view2">
<tr class="principal">
<td colspan="2" align="center"><b>DATOS DEL CONTRATO</b></td>
<tr>';
foreach ($data as $dat)
echo '<tr class="odd"><td> <b>N° Control</b> </td><td> '.$dat['patente'].'</td></tr>';
echo '</table>';
*/

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
                'name'=>'Combustible',
                'value' => '$data["combu"]',
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
                'name'=>'Km Inicial',
                'value' => 'OrdenTrabajo::formatearKm($data["ini"])',
                'htmlOptions'=>array('style' => 'text-align: right;'),
            ),
            array(
                'name'=>'Km Final',
                'value' => 'OrdenTrabajo::formatearKm($data["fina"])',
                'htmlOptions'=>array('style' => 'text-align: right;'),
            ),
            array(
                'name'=>'Recorrido',
                'value' => 'OrdenTrabajo::formatearKm($data["recorrido"])',
                'htmlOptions'=>array('style' => 'text-align: right;'),
            ),array(
                'name'=>'Litros Diesel',
                'value' => '$data["litrosdiesel"]',
                'htmlOptions'=>array('style' => 'text-align: center;'),
            ),
            array(
                'name'=>'Litros Gasolina',
                'value' => '$data["litrosgaso"]',
                'htmlOptions'=>array('style' => 'text-align: center;'),
            ),
            array(
                'name'=>'Litros Facturas',
                'value' => '$data["litrosfactura"]',
                'htmlOptions'=>array('style' => 'text-align: center;'),
            ),
            array(
                'name'=>'Litros Bitacora',
                'value' => '$data["litrosbitacora"]',
                'htmlOptions'=>array('style' => 'text-align: center;'),
            ),
            array(
                'name'=>'Total Litros',
                'value' => '$data["totallitros"]',
                'htmlOptions'=>array('style' => 'text-align: center;'),
            ),
            array(
                'name'=>'Costo Combustible',
                'value' => 'OrdenTrabajo::formatearPeso($data["precioxlitro"])',
                'htmlOptions'=>array('style' => 'text-align: right;'),
            ),
            array(
                'name'=>'Km/Litros',
                'value' => 'number_format($data["kmlitros"],2,",",".")',
                'htmlOptions'=>array('style' => 'text-align: center;'),
            ),
            array(
                'name'=>'Pesos/Km',
                'value' => '$data["pesoskm"]',
                'htmlOptions'=>array('style' => 'text-align: right;'),
            ),
    ),
));

$data2 = $dataProvider2->getData();
$data3 = $dataProvider3->getData();
?>
<b><?php echo 'Totales Reales'?>:</b>
    <?php echo OrdenTrabajo::formatearPeso($data2[0]['total']); ?>
    <br />
    
    <b><?php echo 'Presupuesto Anual'?>:</b>
    <?php echo isset($data3[0]['ppto_anual']) ? OrdenTrabajo::formatearPeso($data3[0]['ppto_anual']) : ''; ?>
    <br />
    
    <b><?php echo 'Presupuesto Mensual'?>:</b>
    <?php echo isset($data3[0]['ppto_mensual']) ? OrdenTrabajo::formatearPeso($data3[0]['ppto_mensual']) : ''; ?>
    <br />
    
    <b><?php echo 'Presupuesto Disponible'?>:</b>
    <?php echo isset($data4[0]['total']) && isset($data3[0]['ppto_mensual']) ? OrdenTrabajo::formatearPeso($data3[0]['ppto_mensual'] - $data4[0]['total']) : ''; ?>
    <br />