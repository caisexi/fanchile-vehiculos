<?php

$this->breadcrumbs = array(Yii::t('app', 'Resumen Parcial'));

?>
<div class="form">
    <?php echo CHtml::beginForm('bparcial','get'); ?>

    <div class="row">
        <?php echo CHtml::Label('Fecha Inicio','fecha_inicial'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'fecha_inicial',
            'language' => 'es',
            'options' => array(
                    'showButtonPanel' => true,
                    'changeYear' => true,
                    'dateFormat' => 'yy-mm-dd',
                    ),
            'value' => isset ($_GET['fecha_inicial']) ? $_GET['fecha_inicial'] : '',
            ));
        ; ?>
    </div>
    <div class="row">
        <?php echo CHtml::Label('Fecha Termino','fecha_termino'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'fecha_termino',
            'language' => 'es',
            'options' => array(
                    'showButtonPanel' => true,
                    'changeYear' => true,
                    'dateFormat' => 'yy-mm-dd',
                    ),
            'value' => isset ($_GET['fecha_termino']) ? $_GET['fecha_termino'] : '',
            ));
        ; ?>
    </div>
    
    <div class="row submit">
        <?php echo GxHtml::submitButton(Yii::t('app', 'Consultar'),array('class' => 'boton')); ?>
    </div>
    
<?php echo CHtml::endForm(); ?>
    
</div><!-- form -->

<?php
if(isset ($_GET['fecha_inicial']) && isset ($_GET['fecha_termino']))
{
?>
<h1>MANTENCIONES DEL <font color="yellow"><?php echo date('d-m-Y',strtotime($fechainicial)); ?></font> AL <font color="yellow"><?php echo date('d-m-Y',strtotime($fechafinal)) ?></font></h1>
<?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'summaryText'=>'', 
        'dataProvider' => $dataProvider,
        'emptyText' => 'No hay resultados',
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
                'name'=>'Kilometraje Inicial',
                'value' => 'OrdenTrabajo::formatearKm($data["ini"])',
                'htmlOptions'=>array('style' => 'text-align: right;'),
            ),
            array(
                'name'=>'Kilometraje Final',
                'value' => 'OrdenTrabajo::formatearKm($data["final"])',
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
    if($dataProvider->getData() != null)
        echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/pdf.png','Lov'), 'bparcial?pdf=1&fecha_inicial='.$fechainicial.'&fecha_termino='.$fechafinal);
}
?>