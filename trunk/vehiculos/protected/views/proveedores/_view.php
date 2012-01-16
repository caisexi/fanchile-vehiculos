<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('nombre')); ?>:
	<?php echo GxHtml::encode($data->nombre); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('direccion')); ?>:
	<?php echo GxHtml::encode($data->direccion); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_ciudad')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idCiudad)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('correo')); ?>:
	<?php echo GxHtml::encode($data->correo); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('nombreContacto')); ?>:
	<?php echo GxHtml::encode($data->nombreContacto); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('apellidoContacto')); ?>:
	<?php echo GxHtml::encode($data->apellidoContacto); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('rutProveedor')); ?>:
	<?php echo GxHtml::encode($data->rutProveedor); ?>
	<br />
	*/ ?>

</div>