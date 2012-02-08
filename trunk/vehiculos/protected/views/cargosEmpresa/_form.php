<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'cargos-empresa-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Los campos con'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'son obligatorios'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model, 'nombre', array('maxlength' => 40,'size'=>'50')); ?>
		<?php echo $form->error($model,'nombre'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'id_area_empresa'); ?>
		<?php echo $form->dropDownList($model, 'id_area_empresa', GxHtml::listDataEx(AreasEmpresa::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_area_empresa'); ?>
		</div><!-- row -->

<?php
echo GxHtml::submitButton(Yii::t('app', 'Guardar'),array('class' => 'boton'));
$this->endWidget();
?>
</div><!-- form -->