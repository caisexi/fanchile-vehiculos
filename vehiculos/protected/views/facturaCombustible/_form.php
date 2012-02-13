<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'factura-combustible-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'nro_factura'); ?>
		<?php echo $form->textField($model, 'nro_factura', array('maxlength' => 10)); ?>
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
		<?php echo $form->labelEx($model,'id_combustible'); ?>
		<?php echo $form->textField($model, 'id_combustible'); ?>
		<?php echo $form->error($model,'id_combustible'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'neto'); ?>
		<?php echo $form->textField($model, 'neto'); ?>
		<?php echo $form->error($model,'neto'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'iva'); ?>
		<?php echo $form->textField($model, 'iva'); ?>
		<?php echo $form->error($model,'iva'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'especifico'); ?>
		<?php echo $form->textField($model, 'especifico'); ?>
		<?php echo $form->error($model,'especifico'); ?>
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
		<div class="row">
		<?php echo $form->labelEx($model,'valor_lt'); ?>
		<?php echo $form->textField($model, 'valor_lt'); ?>
		<?php echo $form->error($model,'valor_lt'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'valor_guia'); ?>
		<?php echo $form->textField($model, 'valor_guia'); ?>
		<?php echo $form->error($model,'valor_guia'); ?>
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


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->