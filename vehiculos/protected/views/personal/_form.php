<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'personal-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'rut'); ?>
		<?php echo $form->textField($model, 'rut', array('maxlength' => 9)); ?>
		<?php echo $form->error($model,'rut'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model, 'nombre', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'nombre'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'apellido_pat'); ?>
		<?php echo $form->textField($model, 'apellido_pat', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'apellido_pat'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'apellido_mat'); ?>
		<?php echo $form->textField($model, 'apellido_mat', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'apellido_mat'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'id_cargo_empresa'); ?>
		<?php echo $form->dropDownList($model, 'id_cargo_empresa', GxHtml::listDataEx(CargosEmpresa::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_cargo_empresa'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('historialVehiculoses')); ?></label>
		<?php echo $form->checkBoxList($model, 'historialVehiculoses', GxHtml::encodeEx(GxHtml::listDataEx(HistorialVehiculos::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->