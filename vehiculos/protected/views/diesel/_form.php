<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'diesel-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'id_vehiculo'); ?>
		<?php echo $form->dropDownList($model, 'id_vehiculo', GxHtml::listDataEx(Vehiculos::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_vehiculo'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'id_combustible'); ?>
		<?php echo $form->dropDownList($model, 'id_combustible', GxHtml::listDataEx(Combustibles::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_combustible'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'nro_factura'); ?>
		<?php echo $form->textField($model, 'nro_factura'); ?>
		<?php echo $form->error($model,'nro_factura'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'fecha',
			'value' => $model->fecha,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
		<?php echo $form->error($model,'fecha'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'region'); ?>
		<?php echo $form->textField($model, 'region'); ?>
		<?php echo $form->error($model,'region'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'estacion'); ?>
		<?php echo $form->textField($model, 'estacion', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'estacion'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'litros'); ?>
		<?php echo $form->textField($model, 'litros', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'litros'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'precio_u'); ?>
		<?php echo $form->textField($model, 'precio_u'); ?>
		<?php echo $form->error($model,'precio_u'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'especifico'); ?>
		<?php echo $form->textField($model, 'especifico'); ?>
		<?php echo $form->error($model,'especifico'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'total'); ?>
		<?php echo $form->textField($model, 'total'); ?>
		<?php echo $form->error($model,'total'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'nro_guia'); ?>
		<?php echo $form->textField($model, 'nro_guia'); ?>
		<?php echo $form->error($model,'nro_guia'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'rollo'); ?>
		<?php echo $form->textField($model, 'rollo'); ?>
		<?php echo $form->error($model,'rollo'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->