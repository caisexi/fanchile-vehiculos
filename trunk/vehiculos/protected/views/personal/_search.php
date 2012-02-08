<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'rut'); ?>
		<?php echo $form->textField($model, 'rut', array('maxlength' => 9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'nombre'); ?>
		<?php echo $form->textField($model, 'nombre', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'apellido_pat'); ?>
		<?php echo $form->textField($model, 'apellido_pat', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'apellido_mat'); ?>
		<?php echo $form->textField($model, 'apellido_mat', array('maxlength' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'id_cargo_empresa'); ?>
		<?php echo $form->dropDownList($model, 'id_cargo_empresa', GxHtml::listDataEx(CargosEmpresa::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
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
