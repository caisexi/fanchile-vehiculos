<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'id_detalle_reparacion'); ?>
		<?php echo $form->dropDownList($model, 'id_detalle_reparacion', GxHtml::listDataEx(DetalleReparacion::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'id_ot'); ?>
		<?php echo $form->dropDownList($model, 'id_ot', GxHtml::listDataEx(OrdenTrabajo::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'cantidad'); ?>
		<?php echo $form->textField($model, 'cantidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'id_marca'); ?>
		<?php echo $form->dropDownList($model, 'id_marca', GxHtml::listDataEx(MarcasRepuestos::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'observacion'); ?>
		<?php echo $form->textArea($model, 'observacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'precio_unitario'); ?>
		<?php echo $form->textField($model, 'precio_unitario'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
