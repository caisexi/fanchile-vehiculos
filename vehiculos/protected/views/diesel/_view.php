<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_planilla')); ?>:</b>
	<?php echo CHtml::encode($data->id_planilla); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_vehiculo')); ?>:</b>
	<?php echo CHtml::encode($data->id_vehiculo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nro_factura')); ?>:</b>
	<?php echo CHtml::encode($data->nro_factura); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('region')); ?>:</b>
	<?php echo CHtml::encode($data->region); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estacion')); ?>:</b>
	<?php echo CHtml::encode($data->estacion); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('litros')); ?>:</b>
	<?php echo CHtml::encode($data->litros); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precio_u')); ?>:</b>
	<?php echo CHtml::encode($data->precio_u); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('especifico')); ?>:</b>
	<?php echo CHtml::encode($data->especifico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('variable')); ?>:</b>
	<?php echo CHtml::encode($data->variable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total')); ?>:</b>
	<?php echo CHtml::encode($data->total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nro_guia')); ?>:</b>
	<?php echo CHtml::encode($data->nro_guia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rollo')); ?>:</b>
	<?php echo CHtml::encode($data->rollo); ?>
	<br />

	*/ ?>

</div>