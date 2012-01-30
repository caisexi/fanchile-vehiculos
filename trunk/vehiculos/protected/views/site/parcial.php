<?php

$dataProvider=new CActiveDataProvider('Vehiculos');

$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
    'columns'=>array(
        'ano',
        'idColor0.nombre',
    )
    
));
?>
