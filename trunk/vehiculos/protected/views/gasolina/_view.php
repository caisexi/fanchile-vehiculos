<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('id_planilla')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idPlanilla)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_vehiculo')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idVehiculo)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tarjeta')); ?>:
	<?php echo GxHtml::encode($data->tarjeta); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('fecha')); ?>:
	<?php echo GxHtml::encode($data->fecha); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('hora')); ?>:
	<?php echo GxHtml::encode($data->hora); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('comuna')); ?>:
	<?php echo GxHtml::encode($data->comuna); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('direccion')); ?>:
	<?php echo GxHtml::encode($data->direccion); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('nro_transaccion')); ?>:
	<?php echo GxHtml::encode($data->nro_transaccion); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('precio_u')); ?>:
	<?php echo GxHtml::encode($data->precio_u); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('litros')); ?>:
	<?php echo GxHtml::encode($data->litros); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('total')); ?>:
	<?php echo GxHtml::encode($data->total); ?>
	<br />
	*/ ?>

</div>