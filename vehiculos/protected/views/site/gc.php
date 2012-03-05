<div class="form">
    <?php echo CHtml::beginForm('gastocombustible','get'); ?>

    <div class="row">
        <?php echo CHtml::label('Año','anio'); ?>
        <?php echo CHtml::textfield('anio',  isset ($_GET['anio']) ? $_GET['anio'] : ''); ?>
    </div> 
   <div class="row">
        <?php echo CHtml::label('Vehiculo','anio'); ?>
        <?php echo CHtml::hiddenField('cv',1); ?>
        <?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                    'name'=>'patente',
                    'attribute'=>'idVehiculo',
                    'source'=>$this->createUrl('ordentrabajo/ACVehi'),
                    'options'=>array(
                        'showAnim'=>'fold',
                        'minLength'=>'1',
                        'select'=>'js:function(event, ui) { $("#cv").val(ui.item.id);}'
                    ),
                ));
        ?>
        
    </div> 

    <div class="row submit">
        <?php echo GxHtml::submitButton(Yii::t('app', 'Consultar'),array('class' => 'boton')); ?>
    </div>
    
<?php echo CHtml::endForm(); ?>
    
</div><!-- form -->
<div chart>
<?php
if((isset($dataProvider) && ($data = $dataProvider->getData()) != null ) || (isset($dataProvider2) && ($data2 = $dataProvider2->getData()) != null ) || (isset($dataProvider3) && ($data4 = $dataProvider4->getData()) != null ) || (isset($dataProvider4) && ($data4 = $dataProvider4->getData()) != null ))
{
    for($i = 0; $i < 12;$i++)
    {
        $dataHc[$i] = 0;
    }
    $textipo = '';
    
    if((isset($dataProvider) && ($data = $dataProvider->getData())))
    {
        foreach($data as $d1)
        {
            $dataHc[$d1['mes']-1] = (float)$dataHc[$d1['mes']-1] + (float)$d1['gasolitros'];
            if(isset ($d1['combu']))
                $textipo = $d1['combu'];
        }
    }
    
    if((isset($dataProvider2) && ($data2 = $dataProvider2->getData())))
    {
        foreach($data2 as $d2)
        {
            $dataHc[$d2['mes']-1] = (float)$dataHc[$d2['mes']-1] + (float)$d2['diesilitros'];
            if(isset ($d2['combu']))
                $textipo = $d2['combu'];
        }
    }
    
    if((isset($dataProvider3) && ($data3 = $dataProvider3->getData())))
    {
        foreach($data3 as $d3)
        {
            $dataHc[$d3['mes']-1] = (float) $dataHc[$d3['mes']-1] + (float)$d3['factulitros'];
            //print_r($d3);
            if(isset ($d3['combu']))
                $textipo = $d3['combu'];
        }
    }
    
    if((isset($dataProvider4) && ($data4 = $dataProvider4->getData())))
    {
        foreach($data4 as $d4)
        {
            print_r($d4);
            
            $dataHc[$d4['mes']-1] = (float)$dataHc[$d4['mes']-1] + (float)$d4['litrosad'];
            print_r($dataHc);
        }
    }
    
    if(isset ($_GET['cv']) && $_GET['cv'] == true)
        $texto = ' del vehiculo patente '.OrdenTrabajo::formatearPatente($_GET['patente']);
    else
        $texto = '';
    $this->Widget('ext.highcharts.HighchartsWidget', array(
       'options'=>array(
          'title' => array('text' => 'Total de combustible '.$textipo.' el Año '.$anio.$texto),
          'tooltip' => array(
            'formatter' => 'js:function(){ return "<b>Total litros de "+ this.x +":</b>"+ this.y; }'
          ),
          'xAxis' => array(
             'categories' => array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre')
          ),
          'yAxis' => array(
             'title' => array('text' => 'Gasto en Litros')
          ),
          'series' => array(
             array('name' => 'Consumo'.' en litros del año '.$anio.$texto, 'data' => $dataHc)
          ),
          'credits' => array('enabled' => false),
          //'theme' => 'grid',
       )
    )); 
}
else
{
    echo 'No hay resultados';
}
?>
</div>