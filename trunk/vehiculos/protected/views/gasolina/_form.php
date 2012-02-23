<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'gasolina-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'id_planilla'); ?>
		<?php echo $form->dropDownList($model, 'id_planilla', GxHtml::listDataEx(PlanillasCopec::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_planilla'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'id_vehiculo'); ?>
		<?php echo $form->dropDownList($model, 'id_vehiculo', GxHtml::listDataEx(Vehiculos::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_vehiculo'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'tarjeta'); ?>
		<?php echo $form->textField($model, 'tarjeta', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'tarjeta'); ?>
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
		<?php echo $form->labelEx($model,'hora'); ?>
		<?php echo $form->textField($model, 'hora'); ?>
		<?php echo $form->error($model,'hora'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'comuna'); ?>
		<?php echo $form->textField($model, 'comuna', array('maxlength' => 40)); ?>
		<?php echo $form->error($model,'comuna'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'direccion'); ?>
		<?php echo $form->textField($model, 'direccion', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'direccion'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'nro_transaccion'); ?>
		<?php echo $form->textField($model, 'nro_transaccion', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'nro_transaccion'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'precio_u'); ?>
		<?php echo $form->textField($model, 'precio_u'); ?>
		<?php echo $form->error($model,'precio_u'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'litros'); ?>
		<?php echo $form->textField($model, 'litros', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'litros'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'total'); ?>
		<?php echo $form->textField($model, 'total'); ?>
		<?php echo $form->error($model,'total'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->