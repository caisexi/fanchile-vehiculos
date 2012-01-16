<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'vehiculos-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'idCombustible'); ?>
		<?php echo $form->dropDownList($model, 'idCombustible', GxHtml::listDataEx(Combustibles::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'idCombustible'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'idTipoVehiculo'); ?>
		<?php echo $form->dropDownList($model, 'idTipoVehiculo', GxHtml::listDataEx(TiposVehiculos::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'idTipoVehiculo'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'idProveedor'); ?>
		<?php echo $form->dropDownList($model, 'idProveedor', GxHtml::listDataEx(Proveedores::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'idProveedor'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'idMarca'); ?>
		<?php echo $form->dropDownList($model, 'idMarca', GxHtml::listDataEx(MarcasVehiculos::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'idMarca'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'idModelo'); ?>
		<?php echo $form->dropDownList($model, 'idModelo', GxHtml::listDataEx(ModelosVehiculos::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'idModelo'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'idColor'); ?>
		<?php echo $form->dropDownList($model, 'idColor', GxHtml::listDataEx(ColoresVehiculos::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'idColor'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'ano'); ?>
		<?php echo $form->textField($model, 'ano', array('maxlength' => 4)); ?>
		<?php echo $form->error($model,'ano'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'patente'); ?>
		<?php echo $form->textField($model, 'patente', array('maxlength' => 6)); ?>
		<?php echo $form->error($model,'patente'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'precioCompra'); ?>
		<?php echo $form->textField($model, 'precioCompra'); ?>
		<?php echo $form->error($model,'precioCompra'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'creado'); ?>
		<?php echo $form->textField($model, 'creado'); ?>
		<?php echo $form->error($model,'creado'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'modificado'); ?>
		<?php echo $form->textField($model, 'modificado'); ?>
		<?php echo $form->error($model,'modificado'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->