<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('id_detalle_reparacion')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idDetalleReparacion)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_ot')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idOt)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('cantidad')); ?>:
	<?php echo GxHtml::encode($data->cantidad); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_marca')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idMarca)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('observacion')); ?>:
	<?php echo GxHtml::encode($data->observacion); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('precio_unitario')); ?>:
	<?php echo GxHtml::encode($data->precio_unitario); ?>
	<br />

</div>