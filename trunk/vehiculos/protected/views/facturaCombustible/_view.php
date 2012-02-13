<div class="view" onclick="location.href='view/<?php echo $data->id?>'" onmouseover="this.style.backgroundColor='#7AC08E'"  onmouseout="this.style.backgroundColor='#fff'">
	<?php echo GxHtml::encode($data->getAttributeLabel('nro_factura')); ?>:
	<?php echo GxHtml::encode($data->nro_factura); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('fecha')); ?>:
	<?php echo GxHtml::encode($data->fecha); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_combustible')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idCombustible)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('neto')); ?>:
	<?php echo GxHtml::encode($data->neto); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('iva')); ?>:
	<?php echo GxHtml::encode($data->iva); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('especifico')); ?>:
	<?php echo GxHtml::encode($data->especifico); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('litros')); ?>:
	<?php echo GxHtml::encode($data->litros); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('total')); ?>:
	<?php echo GxHtml::encode($data->total); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('valor_lt')); ?>:
	<?php echo GxHtml::encode($data->valor_lt); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('valor_guia')); ?>:
	<?php echo GxHtml::encode($data->valor_guia); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('creado')); ?>:
	<?php echo GxHtml::encode($data->creado); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('modificado')); ?>:
	<?php echo GxHtml::encode($data->modificado); ?>
	<br />
	*/ ?>

</div>