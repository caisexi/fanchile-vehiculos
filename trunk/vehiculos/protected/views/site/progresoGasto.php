<div chart>
<?php

$data = $dataProvider->getData();
$this->Widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(
      'title' => array('text' => 'Progreso Gastos Reparaciones'),
      'tooltip' => array(
        'formatter' => 'js:function(){ return "<b>Gastos de "+ this.x +":</b>"+ formatCurrency(this.y); }'
      ),
      'xAxis' => array(
         'categories' => array('Enero', 'Febrero')
      ),
      'yAxis' => array(
         'title' => array('text' => 'Gasto Reparacion')
      ),
      'series' => array(
         array('name' => 'Gasto', 'data' => array((integer)$data[0]['gastoMensual'], (integer)$data[1]['gastoMensual'])),
         //array('name' => 'Gasto', 'data' => array(700000, 900000)),
      ),
      'credits' => array('enabled' => false),
      //'theme' => 'grid',
   )
)); 
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