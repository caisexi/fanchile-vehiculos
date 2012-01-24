<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'usuarios-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'usuario'); ?>
		<?php echo $form->textField($model, 'usuario', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'usuario'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'contrasena'); ?>
		<?php echo $form->textField($model, 'contrasena', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'contrasena'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->