<div class="view" onclick="location.href='view/<?php echo $data->id?>'" onmouseover="this.style.backgroundColor='#7AC08E'"  onmouseout="this.style.backgroundColor='#fff'">

	<?php echo GxHtml::encode($data->getAttributeLabel('nro_guia')); ?>:
	<?php echo GxHtml::encode($data->nro_guia); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_vehiculo')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idVehiculo)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_rf')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idRf)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('fecha')); ?>:
	<?php echo GxHtml::encode($data->fecha); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('kilometraje')); ?>:
	<?php echo GxHtml::encode($data->kilometraje); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('creado')); ?>:
	<?php echo GxHtml::encode($data->creado); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('modificado')); ?>:
	<?php echo GxHtml::encode($data->modificado); ?>
	<br />
	*/ ?>

</div>