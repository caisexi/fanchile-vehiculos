<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
        <?php   
            $criteria=new CDbCriteria;                        
            $criteria->order='patente ASC';
        ?>

	<div class="row">
		<?php echo $form->label($model, 'id_vehiculo'); ?>
		<?php echo $form->dropDownList($model, 'id_vehiculo', GxHtml::listDataEx(Vehiculos::model()->findAllAttributes(null, true,$criteria)), array('prompt' => Yii::t('app', 'All'))); ?>
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
		<?php echo $form->label($model,'kilometraje_inicial'); ?>
		<?php echo $form->textField($model,'kilometraje_inicial'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kilometraje_final'); ?>
		<?php echo $form->textField($model,'kilometraje_final'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'litros_adicionales'); ?>
		<?php echo $form->textField($model,'litros_adicionales',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->