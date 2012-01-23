<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'registro-factura-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'nro_factura'); ?>
		<?php echo $form->textField($model, 'nro_factura'); ?>
		<?php echo $form->error($model,'nro_factura'); ?>
		</div><!-- row -->
		
		<div class="row">
		<?php echo $form->labelEx($model,'id_proveedor'); ?>
		<?php echo $form->dropDownList($model, 'id_proveedor', GxHtml::listDataEx(Proveedores::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_proveedor'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
                        'language' => 'es',
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
		<?php echo $form->labelEx($model,'total_neto'); ?>
		<?php echo $form->textField($model, 'total_neto'); ?>
		<?php echo $form->error($model,'total_neto'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'total_bruto'); ?>
		<?php echo $form->textField($model, 'total_bruto'); ?>
		<?php echo $form->error($model,'total_bruto'); ?>
		</div><!-- row -->
<?php
echo GxHtml::submitButton(Yii::t('app', 'Guardar'));
$this->endWidget();
?>
</div><!-- form -->