<div class="view" onclick="location.href='view/<?php echo $data->id?>'" onmouseover="this.style.backgroundColor='#7AC08E'"  onmouseout="this.style.backgroundColor='#fff'">

	<?php echo GxHtml::encode($data->getAttributeLabel('usuario')); ?>:
	<?php echo GxHtml::encode($data->usuario); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('creado')); ?>:
	<?php echo GxHtml::encode($data->creado); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('modificado')); ?>:
	<?php echo GxHtml::encode($data->modificado); ?>
	<br />

</div>