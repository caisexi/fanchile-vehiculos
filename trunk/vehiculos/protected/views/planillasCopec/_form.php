<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'planillas-copec-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model, 'id', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'tipo_planilla'); ?>
		<?php echo $form->textField($model, 'tipo_planilla'); ?>
		<?php echo $form->error($model,'tipo_planilla'); ?>
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

		<label><?php echo GxHtml::encode($model->getRelationLabel('diesels')); ?></label>
		<?php echo $form->checkBoxList($model, 'diesels', GxHtml::encodeEx(GxHtml::listDataEx(Diesel::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('gasolinas')); ?></label>
		<?php echo $form->checkBoxList($model, 'gasolinas', GxHtml::encodeEx(GxHtml::listDataEx(Gasolina::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->