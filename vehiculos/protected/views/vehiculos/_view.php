<div class="view" onclick="location.href='view/<?php echo $data->id?>'" onmouseover="this.style.backgroundColor='#7AC08E'"  onmouseout="this.style.backgroundColor='#fff'">

	<?php echo GxHtml::encode($data->getAttributeLabel('idCombustible')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idCombustible0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('idTipoVehiculo')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idTipoVehiculo0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('idProveedor')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idProveedor0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('idMarca')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idMarca0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('idModelo')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idModelo0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('idColor')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idColor0)); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('ano')); ?>:
	<?php echo GxHtml::encode($data->ano); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('patente')); ?>:
	<?php echo GxHtml::encode($data->patente); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('precioCompra')); ?>:
	<?php echo GxHtml::encode($data->precioCompra); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('creado')); ?>:
	<?php echo GxHtml::encode($data->creado); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('modificado')); ?>:
	<?php echo GxHtml::encode($data->modificado); ?>
	<br />
	*/ ?>

</div>