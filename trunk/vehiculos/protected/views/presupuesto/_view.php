<div class="view" onclick="location.href='view/<?php echo $data->id?>'" onmouseover="this.style.backgroundColor='#7AC08E'"  onmouseout="this.style.backgroundColor='#fff'">

	<?php echo GxHtml::encode($data->getAttributeLabel('ano')); ?>:
	<?php echo GxHtml::encode($data->ano); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ppto_anual')); ?>:
	<?php echo GxHtml::encode(OrdenTrabajo::formatearPeso($data->ppto_anual)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ppto_mensual')); ?>:
	<?php echo GxHtml::encode(OrdenTrabajo::formatearPeso($data->ppto_mensual)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('creado')); ?>:
	<?php echo GxHtml::encode($data->creado); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('modificado')); ?>:
	<?php echo GxHtml::encode($data->modificado); ?>
	<br />

</div>