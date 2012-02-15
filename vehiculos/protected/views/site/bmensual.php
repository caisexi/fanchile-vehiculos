<?php

$this->breadcrumbs = array(Yii::t('app', 'Resumen Mensual'));

?>
<div class="form">
    <?php echo CHtml::beginForm('bmensual','get'); ?>
    
    <div class="form">
    <?php echo CHtml::beginForm('bparcial','get'); ?>

    <div class="row">
    <?php echo CHtml::label('Año','ano'); ?>
    <?php echo CHtml::textField('ano', date("Y")); ?>
    </div>
    
    <div class="row">
    <?php echo CHtml::label('Mes','mes'); ?>
    <?php echo CHtml::dropDownList('mes', '',array('1' => 'Enero','2' => 'Febrero','3' => 'Marzo','4' => 'Abril','5' => 'Mayo','6' => 'Junio','7' => 'Julio','8' => 'Agosto','9' => 'Septiembre','10' => 'Octubre','11' => 'Noviembre','12' => 'Diciembre',)); ?>

    </div><!-- row -->
    
    <div class="row submit">
        <?php echo GxHtml::submitButton(Yii::t('app', 'Consultar'),array('class' => 'boton')); ?>
    </div>
    
<?php echo CHtml::endForm(); ?>

</div><!-- form -->

<?php
if(isset ($_GET['mes']))
{
?>
<h1>MANTENCIONES DEL <font color="yellow"><?php echo date('m',strtotime($mes)); ?></font></h1>
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
                'name'=>'Recorrido Parcial',
                'value' => 'OrdenTrabajo::formatearKm($data["recorrido"])',
                'htmlOptions'=>array('style' => 'text-align: right;'),
            ),
            array(
                'name'=>'Litros',
                'value' => 'OrdenTrabajo::formatearPeso($data["litros"])',
                'htmlOptions'=>array('style' => 'text-align: right;'),
            ),
            array(
                'name'=>'Costo Combustible',
                'value' => 'OrdenTrabajo::formatearPeso($data["costocombustible"])',
                'htmlOptions'=>array('style' => 'text-align: right;'),
            ),
            array(
                'name'=>'Km/Litros',
                'value' => '$data["kmlitros"]',
            ),
            array(
                'name'=>'Pesos/Km',
                'value' => '$data["pesoskm"]',
            ),
        ),
    ));
    echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/pdf.png','Lov'), 'bmensual?pdf=1&mes='.$mes);
}
?>