<div class="form">
    <?php echo CHtml::beginForm('progresoGasto','get'); ?>

    <div class="row">
        <?php echo CHtml::label('Año',0); ?>
        <?php echo CHtml::hiddenField('vehiculo'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'name'=>'Vehiculo',
            'source'=>$this->createUrl('ordentrabajo/ACVehi'),
            'options'=>array(
                'showAnim'=>'fold',
                'minLength'=>'1',
                'select'=>'js:function(event, ui) { $("#OrdenTrabajo_id_rf").val(ui.item.id);}'
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
if(isset($dataProvider))
{
    $data = $dataProvider->getData();
    $this->Widget('ext.highcharts.HighchartsWidget', array(
       'options'=>array(
          'title' => array('text' => 'Progreso Gastos Reparaciones'),
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
             array('name' => 'Gasto', 'data' => array((integer)$data[0]['gastoMensual'], (integer)$data[1]['gastoMensual']),0,0,0,0,0,0,0,0,0,0),
          ),
          'credits' => array('enabled' => false),
          //'theme' => 'grid',
       )
    )); 
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
centavos = num % 100;
num = Math.floor(num / 100).toString();

if (centavos < 10)
centavos = '0' + centavos;

for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
num = num.substring(0, num.length - (4 * i + 3)) + '.' + num.substring(num.length - (4 * i + 3));

return (((signo) ? '' : '-') + '$' + num + ',' + centavos);
}
</script>