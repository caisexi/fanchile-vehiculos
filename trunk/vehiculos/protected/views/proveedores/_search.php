<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'nombre'); ?>
		<?php echo $form->textField($model, 'nombre', array('maxlength' => 30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'direccion'); ?>
		<?php echo $form->textField($model, 'direccion', array('maxlength' => 40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'id_ciudad'); ?>
		<?php echo $form->dropDownList($model, 'id_ciudad', GxHtml::listDataEx(Ciudades::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'correo'); ?>
		<?php echo $form->textField($model, 'correo', array('maxlength' => 30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'nombreContacto'); ?>
		<?php echo $form->textField($model, 'nombreContacto', array('maxlength' => 30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'apellidoContacto'); ?>
		<?php echo $form->textField($model, 'apellidoContacto', array('maxlength' => 30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'rutProveedor'); ?>
		<?php echo $form->textField($model, 'rutProveedor', array('maxlength' => 30)); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Buscar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
