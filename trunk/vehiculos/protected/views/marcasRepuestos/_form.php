<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'marcas-repuestos-form',
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

		<label><?php echo GxHtml::encode($model->getRelationLabel('detallesOts')); ?></label>
		<?php echo $form->checkBoxList($model, 'detallesOts', GxHtml::encodeEx(GxHtml::listDataEx(DetallesOt::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->