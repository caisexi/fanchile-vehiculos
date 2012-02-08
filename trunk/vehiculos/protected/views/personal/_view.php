<div class="view" onclick="location.href='view/<?php echo $data->id?>'" onmouseover="this.style.backgroundColor='#7AC08E'"  onmouseout="this.style.backgroundColor='#fff'">

	<?php echo GxHtml::encode($data->getAttributeLabel('rut')); ?>:
	<?php echo GxHtml::encode($data->rut); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('nombre')); ?>:
	<?php echo GxHtml::encode($data->nombre); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('apellido_pat')); ?>:
	<?php echo GxHtml::encode($data->apellido_pat); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('apellido_mat')); ?>:
	<?php echo GxHtml::encode($data->apellido_mat); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('id_cargo_empresa')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->idCargoEmpresa)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('creado')); ?>:
	<?php echo GxHtml::encode($data->creado); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('modificado')); ?>:
	<?php echo GxHtml::encode($data->modificado); ?>
	<br />

</div>