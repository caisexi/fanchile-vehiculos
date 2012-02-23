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
		<?php echo $form->label($model, 'id_planilla'); ?>
		<?php echo $form->dropDownList($model, 'id_planilla', GxHtml::listDataEx(PlanillasCopec::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'id_vehiculo'); ?>
		<?php echo $form->dropDownList($model, 'id_vehiculo', GxHtml::listDataEx(Vehiculos::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'tarjeta'); ?>
		<?php echo $form->textField($model, 'tarjeta', array('maxlength' => 20)); ?>
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
		<?php echo $form->label($model, 'hora'); ?>
		<?php echo $form->textField($model, 'hora'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'comuna'); ?>
		<?php echo $form->textField($model, 'comuna', array('maxlength' => 40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'direccion'); ?>
		<?php echo $form->textField($model, 'direccion', array('maxlength' => 100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'nro_transaccion'); ?>
		<?php echo $form->textField($model, 'nro_transaccion', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'precio_u'); ?>
		<?php echo $form->textField($model, 'precio_u'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'litros'); ?>
		<?php echo $form->textField($model, 'litros', array('maxlength' => 10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'total'); ?>
		<?php echo $form->textField($model, 'total'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
