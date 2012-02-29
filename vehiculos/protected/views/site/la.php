<div class="form">
    <?php echo CHtml::beginForm('litrosanuales','get'); ?>

    <div class="row">
        <?php echo CHtml::label('Año','anio'); ?>
        <?php echo CHtml::textfield('anio',  isset ($_GET['anio']) ? $_GET['anio'] : ''); ?>
    </div> 

    <div class="row submit">
        <?php echo GxHtml::submitButton(Yii::t('app', 'Consultar'),array('class' => 'boton')); ?>
    </div>
    
<?php echo CHtml::endForm(); ?>
    
</div><!-- form -->
<div chart>
<?php
if((isset($dataProvider) && ($data = $dataProvider->getData()) != null ) || (isset($dataProvider2) && ($data2 = $dataProvider2->getData()) != null ) || (isset($dataProvider3) && ($data3 = $dataProvider3->getData()) != null ) || (isset($dataProvider4) && ($data4 = $dataProvider4->getData()) != null ))
{
    for($i = 0; $i < 12;$i++)
    {
        $dataHc[$i] = 0;
        $dataHc2[$i] = 0;
    }
    
    if((isset($dataProvider) && ($data = $dataProvider->getData())))
    {
        foreach($data as $d1)
        {
            $dataHc[$d1['mes']-1] = (float)$dataHc[$d1['mes']-1] + (float)$d1['gasolitros'];
        }
        //print_r($data);
    }
    
    if((isset($dataProvider2) && ($data2 = $dataProvider2->getData())))
    {
        foreach($data2 as $d2)
        {
            $dataHc2[$d2['mes']-1] = (float)$dataHc2[$d2['mes']-1] + (float)$d2['diesilitros'];
        }
        //print_r($data2);
    }
    
    if((isset($dataProvider3) && ($data3 = $dataProvider3->getData())))
    {
        foreach($data3 as $d3)
        {
            $dataHc[$d3['mes']-1] = (float) $dataHc[$d3['mes']-1] + (float)$d3['factulitros'];
        }
       // print_r($data3);
    }
    
    if((isset($dataProvider4) && ($data4 = $dataProvider4->getData())))
    {
        foreach($data4 as $d4)
        {
            $dataHc2[$d4['mes']-1] = (float)$dataHc2[$d4['mes']-1] + (float)$d4['factulitros'];
        }
        //print_r($data4);
    }
    
    $this->Widget('ext.highcharts.HighchartsWidget', array(
       'options'=>array(
          'title' => array('text' => 'Total de combustible el Año '.$anio),

          'xAxis' => array(
             'categories' => array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre')
          ),
          'yAxis' => array(
             'title' => array('text' => 'Cantidad de Litros')
          ),
          'series' => array(
             array('name' => 'Gasolina ', 'data' => $dataHc),
             array('name' => 'Diesel ', 'data' => $dataHc2)
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