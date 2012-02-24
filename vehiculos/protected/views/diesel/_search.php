<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_planilla'); ?>
		<?php echo $form->textField($model,'id_planilla'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_vehiculo'); ?>
		<?php echo $form->textField($model,'id_vehiculo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nro_factura'); ?>
		<?php echo $form->textField($model,'nro_factura',array('size'=>7,'maxlength'=>7)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'region'); ?>
		<?php echo $form->textField($model,'region'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estacion'); ?>
		<?php echo $form->textField($model,'estacion',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'litros'); ?>
		<?php echo $form->textField($model,'litros',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'precio_u'); ?>
		<?php echo $form->textField($model,'precio_u'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'especifico'); ?>
		<?php echo $form->textField($model,'especifico'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'variable'); ?>
		<?php echo $form->textField($model,'variable'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total'); ?>
		<?php echo $form->textField($model,'total'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nro_guia'); ?>
		<?php echo $form->textField($model,'nro_guia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rollo'); ?>
		<?php echo $form->textField($model,'rollo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->