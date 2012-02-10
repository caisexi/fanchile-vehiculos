<?php
$data = $dataProvider->getData();
$this->Widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(
      'title' => array('text' => 'Progreso Gastos Reparaciones'),
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
