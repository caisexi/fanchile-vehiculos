<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'orden-trabajo-form',
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
		<?php echo $form->labelEx($model,'nro_guia'); ?>
		<?php echo $form->textField($model, 'nro_guia'); ?>
		<?php echo $form->error($model,'nro_guia'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'id_vehiculo'); ?>
		<?php echo $form->dropDownList($model, 'id_vehiculo', GxHtml::listDataEx(Vehiculos::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_vehiculo'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'id_reigistro_factura'); ?>
		<?php echo $form->dropDownList($model, 'id_reigistro_factura', GxHtml::listDataEx(RegistroFactura::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_reigistro_factura'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'kilometraje'); ?>
		<?php echo $form->textField($model, 'kilometraje', array('maxlength' => 7)); ?>
		<?php echo $form->error($model,'kilometraje'); ?>
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

		<label><?php echo GxHtml::encode($model->getRelationLabel('detallesOts')); ?></label>
		<?php echo $form->checkBoxList($model, 'detallesOts', GxHtml::encodeEx(GxHtml::listDataEx(DetallesOt::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->