<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'diesel-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_planilla'); ?>
		<?php echo $form->textField($model,'id_planilla'); ?>
		<?php echo $form->error($model,'id_planilla'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_vehiculo'); ?>
		<?php echo $form->textField($model,'id_vehiculo'); ?>
		<?php echo $form->error($model,'id_vehiculo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nro_factura'); ?>
		<?php echo $form->textField($model,'nro_factura',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'nro_factura'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'region'); ?>
		<?php echo $form->textField($model,'region'); ?>
		<?php echo $form->error($model,'region'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estacion'); ?>
		<?php echo $form->textField($model,'estacion',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'estacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'litros'); ?>
		<?php echo $form->textField($model,'litros',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'litros'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'precio_u'); ?>
		<?php echo $form->textField($model,'precio_u'); ?>
		<?php echo $form->error($model,'precio_u'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'especifico'); ?>
		<?php echo $form->textField($model,'especifico'); ?>
		<?php echo $form->error($model,'especifico'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'variable'); ?>
		<?php echo $form->textField($model,'variable'); ?>
		<?php echo $form->error($model,'variable'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total'); ?>
		<?php echo $form->textField($model,'total'); ?>
		<?php echo $form->error($model,'total'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nro_guia'); ?>
		<?php echo $form->textField($model,'nro_guia'); ?>
		<?php echo $form->error($model,'nro_guia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rollo'); ?>
		<?php echo $form->textField($model,'rollo'); ?>
		<?php echo $form->error($model,'rollo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->