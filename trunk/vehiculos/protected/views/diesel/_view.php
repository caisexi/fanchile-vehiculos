<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('id_vehiculo')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idVehiculo)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_combustible')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idCombustible)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('nro_factura')); ?>:
	<?php echo GxHtml::encode($data->nro_factura); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('fecha')); ?>:
	<?php echo GxHtml::encode($data->fecha); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('region')); ?>:
	<?php echo GxHtml::encode($data->region); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('estacion')); ?>:
	<?php echo GxHtml::encode($data->estacion); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('litros')); ?>:
	<?php echo GxHtml::encode($data->litros); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('precio_u')); ?>:
	<?php echo GxHtml::encode($data->precio_u); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('especifico')); ?>:
	<?php echo GxHtml::encode($data->especifico); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('total')); ?>:
	<?php echo GxHtml::encode($data->total); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('nro_guia')); ?>:
	<?php echo GxHtml::encode($data->nro_guia); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('rollo')); ?>:
	<?php echo GxHtml::encode($data->rollo); ?>
	<br />
	*/ ?>

</div>