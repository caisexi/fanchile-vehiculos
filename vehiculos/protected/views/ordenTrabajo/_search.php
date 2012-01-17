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
		<?php echo $form->label($model, 'nro_guia'); ?>
		<?php echo $form->textField($model, 'nro_guia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'id_vehiculo'); ?>
		<?php echo $form->dropDownList($model, 'id_vehiculo', GxHtml::listDataEx(Vehiculos::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'id_rf'); ?>
		<?php echo $form->dropDownList($model, 'id_rf', GxHtml::listDataEx(RegistroFactura::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'kilometraje'); ?>
		<?php echo $form->textField($model, 'kilometraje', array('maxlength' => 7)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'fecha'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'fecha',
			'value' => $model->fecha,
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'creado'); ?>
		<?php echo $form->textField($model, 'creado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'modificado'); ?>
		<?php echo $form->textField($model, 'modificado'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
