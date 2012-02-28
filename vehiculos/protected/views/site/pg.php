<div class="form">
    <?php echo CHtml::beginForm('progresogasto','get'); ?>

    <div class="row">
        <?php echo CHtml::label('Año','anio'); ?>
        <?php echo CHtml::textfield('anio',  isset ($_GET['anio']) ? $_GET['anio'] : ''); ?>
    </div> 
    <?php
    if(!isset ($_GET['cv']))
    {
    ?>
    <div class="row">
        <?php echo CHtml::label('Incluir vehiculos en Uso','uso'); ?>
        <?php echo CHtml::checkBox('uso',isset ($_GET['uso']) ? true : false); ?>
    </div> 
    <div class="row">
        <?php echo CHtml::label('Incluir vehiculos en Venta','venta'); ?>
        <?php echo CHtml::checkBox('venta',isset ($_GET['venta']) ? true : false); ?>
    </div> 
    <div class="row">
        <?php echo CHtml::label('Incluir vehiculos Vendidos','vendido'); ?>
        <?php echo CHtml::checkBox('vendido',isset ($_GET['vendido']) ? true : false); ?>
    </div> 
    <?php
    }
    ?>
    <?php
    if(isset ($_GET['cv']) && $_GET['cv'] == true)
    {
    ?>
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
                    ),
                ));
        ?>
        
    </div> 
    <?php
    }
    ?>
    <div class="row submit">
        <?php echo GxHtml::submitButton(Yii::t('app', 'Consultar'),array('class' => 'boton')); ?>
    </div>
    
<?php echo CHtml::endForm(); ?>
    
</div><!-- form -->
<div chart>
<?php
if(isset($dataProvider) && ($data = $dataProvider->getData()) != null)
{
    for($i = 0; $i < 12;$i++)
    {
        $dataHc[$i] = 0;
    }
    foreach ($data as $da)
        $dataHc[$da['mes']-1] = (integer)$da['gastoMensual'];

    if(isset ($_GET['cv']) && $_GET['cv'] == true)
        $texto = ' del vehiculo patente '.OrdenTrabajo::formatearPatente($_GET['patente']);
    else
        $texto = '';
    $this->Widget('ext.highcharts.HighchartsWidget', array(
       'options'=>array(
          'title' => array('text' => 'Progreso Gastos Reparaciones Año '.$anio.$texto),
          'tooltip' => array(
            'formatter' => 'js:function(){ return "<b>Gastos de "+ this.x +":</b>"+ formatCurrency(this.y); }'
          ),
          'xAxis' => array(
             'categories' => array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre')
          ),
          'yAxis' => array(
             'title' => array('text' => 'Gasto Reparacion')
          ),
          'series' => array(
             array('name' => 'Gasto'.' Año '.$anio.$texto, 'data' => $dataHc)
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

<script type="text/javascript">
    function formatCurrency(num) 
{
num = num.toString().replace(/\$|\,/g,'');

if (isNaN(num))
num = 0;

var signo = (num == (num = Math.abs(num)));
num = Math.floor(num * 100 + 0.50000000001);
num = Math.floor(num / 100).toString();

for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
num = num.substring(0, num.length - (4 * i + 3)) + '.' + num.substring(num.length - (4 * i + 3));

return (((signo) ? '' : '-') + '$' + num);
}
</script>