<div class="view" onclick="location.href='view/<?php echo $data->id?>'" onmouseover="this.style.backgroundColor='#7AC08E'"  onmouseout="this.style.backgroundColor='#fff'">

	<b><?php echo GxHtml::encode($data->getAttributeLabel('id_vehiculo')); ?>:</b>
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idVehiculo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kilometraje_inicial')); ?>:</b>
	<?php echo CHtml::encode($data->kilometraje_inicial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kilometraje_final')); ?>:</b>
	<?php echo CHtml::encode($data->kilometraje_final); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('litros_adicionales')); ?>:</b>
	<?php echo CHtml::encode($data->litros_adicionales); ?>
	<br />


</div>