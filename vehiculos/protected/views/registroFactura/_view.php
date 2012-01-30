<div class="view" onclick="location.href='view/<?php echo $data->id?>'"  onmouseover="this.style.backgroundColor='#7AC08E'"  onmouseout="this.style.backgroundColor='#fff'">

	<?php echo "<font color='red'>".GxHtml::encode($data->getAttributeLabel('nro_factura'))."</font>"?>:
	<?php echo GxHtml::encode($data->nro_factura); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('total_neto')); ?>:
	<?php echo GxHtml::encode($data->total_neto); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('total_bruto')); ?>:
	<?php echo GxHtml::encode($data->total_bruto); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_proveedor')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idProveedor)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('fecha')); ?>:
	<?php echo GxHtml::encode($data->fecha); ?>
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