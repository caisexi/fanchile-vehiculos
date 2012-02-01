<div class="view" onclick="location.href='view/<?php echo $data->id?>'" onmouseover="this.style.backgroundColor='#7AC08E'"  onmouseout="this.style.backgroundColor='#fff'">

	<?php echo GxHtml::encode($data->getAttributeLabel('nro_factura'))?>:
	<?php echo "<font color='red'>".GxHtml::encode($data->nro_factura)."</font>"; ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('total_neto')); ?>:
	<?php echo "<font color='blue'>".GxHtml::encode(OrdenTrabajo::formatearPeso($data->total_neto))."</font>"; ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('total_bruto')); ?>:
	<?php echo "<font color='blue'>".GxHtml::encode(OrdenTrabajo::formatearPeso($data->total_bruto))."</font>"; ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_proveedor')); ?>:
		<?php echo "<font color='green'>".GxHtml::encode(GxHtml::valueEx($data->idProveedor))."</font>"; ?>
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