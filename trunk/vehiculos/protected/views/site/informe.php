<?php

$this->breadcrumbs = array(Yii::t('app', 'Informe Mensual Combustible'));

?>
<div class="form">
    <?php echo CHtml::beginForm('informe','get'); ?>

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
<h1>INFORME DE COMBUSTIBLE DE <font color="yellow"><?php echo strtoupper($mes_letra); ?></font> DEL <?php echo $ano ;?></h1>
<?php

    $this->widget('zii.widgets.grid.CGridView', array(
        'summaryText'=>'',
        'emptyText' => 'No hay resultados',
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
        
<?php
     
    if($dataProvider->getData() != null)
        echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/pdf.png','Lov'), 'informe?pdf=1&mes='.$mes.'&ano='.$ano);
}
?>