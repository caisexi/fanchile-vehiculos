<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'idCombustible'); ?>
		<?php echo $form->dropDownList($model, 'idCombustible', GxHtml::listDataEx(Combustibles::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'idTipoVehiculo'); ?>
		<?php echo $form->dropDownList($model, 'idTipoVehiculo', GxHtml::listDataEx(TiposVehiculos::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'idProveedor'); ?>
		<?php echo $form->dropDownList($model, 'idProveedor', GxHtml::listDataEx(Proveedores::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'idMarca'); ?>
		<?php echo $form->dropDownList($model, 'idMarca', GxHtml::listDataEx(MarcasVehiculos::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'idModelo'); ?>
		<?php echo $form->dropDownList($model, 'idModelo', GxHtml::listDataEx(ModelosVehiculos::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'idColor'); ?>
		<?php echo $form->dropDownList($model, 'idColor', GxHtml::listDataEx(ColoresVehiculos::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'Año'); ?>
		<?php echo $form->textField($model, 'ano', array('maxlength' => 4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'patente'); ?>
		<?php echo $form->textField($model, 'patente', array('maxlength' => 6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'precioCompra'); ?>
		<?php echo $form->textField($model, 'precioCompra'); ?>
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
