<?php

$this->breadcrumbs = array(Yii::t('app', 'Resumen Mensual'));

?>
<div class="form">
    <?php echo CHtml::beginForm('bmensual','get'); ?>
    
    <div class="row">
    <?php echo CHtml::label('Año','ano'); ?>
    <?php echo CHtml::textField('ano', isset ($_GET['ano']) && $_GET['ano'] != '' ? $_GET['ano'] : date("Y")); ?>
    </div>
    
    <div class="row">
    <?php echo CHtml::label('Mes','mes'); ?>
    <?php echo CHtml::dropDownList('mes', isset($mes) ? $mes : '',array('01' => 'Enero','02' => 'Febrero','03' => 'Marzo','04' => 'Abril','05' => 'Mayo','06' => 'Junio','07' => 'Julio','08' => 'Agosto','09' => 'Septiembre','10' => 'Octubre','11' => 'Noviembre','12' => 'Diciembre',)); ?>

    </div><!-- row -->
    
    <div class="row submit">
        <?php echo GxHtml::submitButton(Yii::t('app', 'Consultar'),array('class' => 'boton')); ?>
    </div>
    
<?php echo CHtml::endForm(); ?>

</div><!-- form -->

<?php

if(isset ($_GET['mes']))
{
    switch($mes){
               case 1: $mes_letra = 'Enero'; break;
               case 2: $mes_letra = 'Febrero'; break; 
               case 3: $mes_letra = 'Marzo'; break; 
               case 4: $mes_letra = 'Abril'; break; 
               case 5: $mes_letra = 'Mayo'; break; 
               case 6: $mes_letra = 'Junio'; break; 
               case 7: $mes_letra = 'Julio'; break; 
               case 8: $mes_letra = 'Agosto'; break;
               case 9: $mes_letra = 'Septiembre'; break; 
               case 10: $mes_letra = 'Octubre'; break; 
               case 11: $mes_letra = 'Noviembre'; break; 
               case 12: $mes_letra = 'Diciembre'; break; 
           }
?>
<h1>MANTENCIONES DE <font color="yellow"><?php echo strtoupper($mes_letra); ?></font> DEL <?php echo $ano ;?></h1>
<?php
$sumat = 0;
$sumal = 0;
$dp = $dataProvider->getData();
foreach ($dp as $dpf)
{
    $sumat += $dpf["totallitros"];
    $sumal += $dpf["costoempresa"];
}
    $this->widget('zii.widgets.grid.CGridView', array(
        'summaryText'=>'',
        'emptyText' => 'No hay resultados',
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
                'footer'=>'Total: '.$sumat,
            ),
            array(
                'name'=>'Costo Combustible',
                'value' => 'OrdenTrabajo::formatearPeso($data["costoempresa"])',
                'htmlOptions'=>array('style' => 'text-align: right;'),
                'footer'=>'Total: '.$sumal,
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
    $data4 = $dataProvider4->getData();

?>
    <b><?php echo 'Total Reparaciones del Mes'?>:</b>
    <?php echo OrdenTrabajo::formatearPeso($data2[0]['total']); ?>
    <br />
    
    <b><?php echo 'Total Reparaciones a la Fecha'?>:</b>
    <?php echo OrdenTrabajo::formatearPeso($data4[0]['total']); ?>
    <br />
    
    <b><?php echo 'Presupuesto Anual'?>:</b>
    <?php echo isset($data3[0]['ppto_anual']) ? OrdenTrabajo::formatearPeso($data3[0]['ppto_anual']) : '$ 0'; ?>
    <br />
    
    <b><?php echo 'Presupuesto Mensual'?>:</b>
    <?php echo isset($data3[0]['ppto_mensual']) ? OrdenTrabajo::formatearPeso($data3[0]['ppto_mensual']) : '$ 0'; ?>
    <br />
    
    <b><?php echo 'Presupuesto Anual Disponible'?>:</b>
    <?php echo isset($data4[0]['total']) && isset($data3[0]['ppto_mensual']) ? OrdenTrabajo::formatearPeso($data3[0]['ppto_anual'] - $data4[0]['total']) : '$ 0'; ?>
    <br />
    
    <b><?php echo 'Presupuesto Mensual Disponible'?>:</b>
    <?php echo isset($data3[0]['ppto_mensual']) ? OrdenTrabajo::formatearPeso($data3[0]['ppto_mensual'] - $data2[0]['total']) : '$ 0'; ?>
    <br />    
        
<?php
     
    if($dataProvider->getData() != null)
        echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/pdf.png','Lov'), 'bmensual?pdf=1&mes='.$mes.'&ano='.$ano);
}
?>