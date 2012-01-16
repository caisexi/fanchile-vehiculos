<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'proveedores-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
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

		<label><?php echo GxHtml::encode($model->getRelationLabel('registroFacturas')); ?></label>
		<?php echo $form->checkBoxList($model, 'registroFacturas', GxHtml::encodeEx(GxHtml::listDataEx(RegistroFactura::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('vehiculoses')); ?></label>
		<?php echo $form->checkBoxList($model, 'vehiculoses', GxHtml::encodeEx(GxHtml::listDataEx(Vehiculos::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->