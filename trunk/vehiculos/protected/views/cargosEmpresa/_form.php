<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'cargos-empresa-form',
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
		<?php echo $form->labelEx($model,'id_area_empresa'); ?>
		<?php echo $form->dropDownList($model, 'id_area_empresa', GxHtml::listDataEx(AreasEmpresa::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_area_empresa'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('personals')); ?></label>
		<?php echo $form->checkBoxList($model, 'personals', GxHtml::encodeEx(GxHtml::listDataEx(Personal::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->