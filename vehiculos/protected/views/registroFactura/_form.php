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
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model, 'id'); ?>
		<?php echo $form->error($model,'id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'nro_factura'); ?>
		<?php echo $form->textField($model, 'nro_factura'); ?>
		<?php echo $form->error($model,'nro_factura'); ?>
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
		<div class="row">
		<?php echo $form->labelEx($model,'id_proveedor'); ?>
		<?php echo $form->dropDownList($model, 'id_proveedor', GxHtml::listDataEx(Proveedores::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_proveedor'); ?>
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
		<?php echo $form->labelEx($model,'creado'); ?>
		<?php echo $form->textField($model, 'creado'); ?>
		<?php echo $form->error($model,'creado'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'modificado'); ?>
		<?php echo $form->textField($model, 'modificado'); ?>
		<?php echo $form->error($model,'modificado'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('ordenTrabajos')); ?></label>
		<?php echo $form->checkBoxList($model, 'ordenTrabajos', GxHtml::encodeEx(GxHtml::listDataEx(OrdenTrabajo::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->