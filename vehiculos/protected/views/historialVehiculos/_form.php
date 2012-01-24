<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'historial-vehiculos-form',
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
		<?php echo $form->labelEx($model,'id_persona'); ?>
		<?php echo $form->dropDownList($model, 'id_persona', GxHtml::listDataEx(Personal::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_persona'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'fecha',
			'value' => $model->fecha,
                        'language'=>'es',
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
		<?php echo $form->error($model,'fecha'); ?>
		</div><!-- row -->



<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->