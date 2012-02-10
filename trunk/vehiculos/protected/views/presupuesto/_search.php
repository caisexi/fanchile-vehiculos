<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>
	<div class="row">
		<?php echo $form->label($model, 'ano'); ?>
		<?php echo $form->textField($model, 'ano', array('maxlength' => 4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'ppto_anual'); ?>
		<?php echo $form->textField($model, 'ppto_anual'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'ppto_mensual'); ?>
		<?php echo $form->textField($model, 'ppto_mensual'); ?>
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
