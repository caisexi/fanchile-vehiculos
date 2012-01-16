<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'detalles-ot-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'id_detalle_reparacion'); ?>
		<?php echo $form->dropDownList($model, 'id_detalle_reparacion', GxHtml::listDataEx(DetalleReparacion::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_detalle_reparacion'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'id_ot'); ?>
		<?php echo $form->dropDownList($model, 'id_ot', GxHtml::listDataEx(OrdenTrabajo::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_ot'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'cantidad'); ?>
		<?php echo $form->textField($model, 'cantidad'); ?>
		<?php echo $form->error($model,'cantidad'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'id_marca'); ?>
		<?php echo $form->dropDownList($model, 'id_marca', GxHtml::listDataEx(MarcasRepuestos::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_marca'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'observacion'); ?>
		<?php echo $form->textArea($model, 'observacion'); ?>
		<?php echo $form->error($model,'observacion'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'precio_unitario'); ?>
		<?php echo $form->textField($model, 'precio_unitario'); ?>
		<?php echo $form->error($model,'precio_unitario'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->