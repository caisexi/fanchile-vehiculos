<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'nro_factura'); ?>
		<?php echo $form->textField($model, 'nro_factura'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'total_neto'); ?>
		<?php echo $form->textField($model, 'total_neto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'total_bruto'); ?>
		<?php echo $form->textField($model, 'total_bruto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'id_proveedor'); ?>
                <?php   $criteria=new CDbCriteria;                        
                        $criteria->order='nombre ASC';
                ?>
		<?php echo $form->dropDownList($model, 'id_proveedor', GxHtml::listDataEx(Proveedores::model()->findAllAttributes(null, true,$criteria)), array('prompt' => Yii::t('app', 'Todos'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'fecha'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'fecha',
                        'language' => 'es',
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
