<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'usuarios-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Los campos con'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'son obligatorios'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'usuario'); ?>
		<?php echo $form->textField($model, 'usuario', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'usuario'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'nueva_contrasena'); ?>
		<?php echo $form->PasswordField($model, 'nueva_contrasena', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'nueva_contrasena'); ?>
		</div><!-- row -->
                <div class="row">
		<?php echo $form->labelEx($model,'contrasena2'); ?>
		<?php echo $form->PasswordField($model, 'contrasena2', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'contrasena2'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Guardar'),array('class' => 'boton'));
$this->endWidget();
?>
</div><!-- form -->