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
		<?php echo $form->label($model, 'id_vehiculo'); ?>
		<?php echo $form->dropDownList($model, 'id_vehiculo', GxHtml::listDataEx(Vehiculos::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'id_combustible'); ?>
		<?php echo $form->dropDownList($model, 'id_combustible', GxHtml::listDataEx(Combustibles::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'nro_factura'); ?>
		<?php echo $form->textField($model, 'nro_factura'); ?>
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
		<?php echo $form->label($model, 'region'); ?>
		<?php echo $form->textField($model, 'region'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'estacion'); ?>
		<?php echo $form->textField($model, 'estacion', array('maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'litros'); ?>
		<?php echo $form->textField($model, 'litros', array('maxlength' => 10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'precio_u'); ?>
		<?php echo $form->textField($model, 'precio_u'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'especifico'); ?>
		<?php echo $form->textField($model, 'especifico'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'total'); ?>
		<?php echo $form->textField($model, 'total'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'nro_guia'); ?>
		<?php echo $form->textField($model, 'nro_guia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'rollo'); ?>
		<?php echo $form->textField($model, 'rollo'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
