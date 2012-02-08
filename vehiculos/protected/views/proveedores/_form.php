<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'proveedores-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Los campos con'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'son obligatorios'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model, 'nombre', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'nombre'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'direccion'); ?>
		<?php echo $form->textField($model, 'direccion', array('maxlength' => 40)); ?>
		<?php echo $form->error($model,'direccion'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'id_ciudad'); ?>
		<?php echo $form->dropDownList($model, 'id_ciudad', GxHtml::listDataEx(Ciudades::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_ciudad'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'correo'); ?>
		<?php echo $form->textField($model, 'correo', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'correo'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'nombreContacto'); ?>
		<?php echo $form->textField($model, 'nombreContacto', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'nombreContacto'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'apellidoContacto'); ?>
		<?php echo $form->textField($model, 'apellidoContacto', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'apellidoContacto'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'rutProveedor'); ?>
		<?php echo $form->textField($model, 'rutProveedor', array('maxlength' => 30)); ?>
		<?php echo $form->error($model,'rutProveedor'); ?>
		</div><!-- row -->

<?php
echo GxHtml::submitButton(Yii::t('app', 'Guardar'),array('class' => 'boton'));
$this->endWidget();
?>
</div><!-- form -->