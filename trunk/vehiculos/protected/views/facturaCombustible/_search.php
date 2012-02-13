<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>
	<div class="row">
		<?php echo $form->label($model, 'nro_factura'); ?>
		<?php echo $form->textField($model, 'nro_factura', array('maxlength' => 10)); ?>
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
		<?php echo $form->label($model, 'id_combustible'); ?>
		<?php echo $form->dropDownList($model, 'id_combustible', GxHtml::listDataEx(Combustibles::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'neto'); ?>
		<?php echo $form->textField($model, 'neto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'iva'); ?>
		<?php echo $form->textField($model, 'iva'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'especifico'); ?>
		<?php echo $form->textField($model, 'especifico'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'litros'); ?>
		<?php echo $form->textField($model, 'litros', array('maxlength' => 10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'total'); ?>
		<?php echo $form->textField($model, 'total'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'valor_lt'); ?>
		<?php echo $form->textField($model, 'valor_lt'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'valor_guia'); ?>
		<?php echo $form->textField($model, 'valor_guia'); ?>
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
		<?php echo GxHtml::submitButton(Yii::t('app', 'Buscar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
