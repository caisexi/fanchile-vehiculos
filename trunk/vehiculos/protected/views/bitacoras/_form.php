<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bitacoras-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">
		<?php echo Yii::t('app', 'Los campos con'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'son obligatorios'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
            <?php echo $form->labelEx($model,'id_vehiculo'); ?>
            <?php echo $form->hiddenField($model,'id_vehiculo'); ?>
            <?php echo $form->error($model,'id_vehiculo'); ?>
            <?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                        'model'=>$model,
                        'attribute'=>'idVehiculo',
                        'source'=>$this->createUrl('ordentrabajo/ACVehi'),
                        'options'=>array(
                            'showAnim'=>'fold',
                            'minLength'=>'1',
                            'select'=>'js:function(event, ui) { $("#Bitacoras_id_vehiculo").val(ui.item.id); if(ui.item.combu == 1) {tipo = "Diesel "} else {tipo = "Gasolina "}; document.getElementById("asdf").innerHTML = "Litros adicionales de " + tipo + "<span class=\"required\">*</span>"}'
                        ),
                    ));
            ?>

        </div> 

		<div class="row">
                    <?php echo $form->labelEx($model,'fecha'); ?>
                    <?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model' => $model,
                            'attribute' => 'fecha',
                            'language'=>'es',
                            'value' => $model->fecha,
                            'options' => array(
                                    'showButtonPanel' => true,
                                    'changeYear' => true,
                                    'dateFormat' => 'yy-mm-dd',
                                    ),
                    ));?>
                    <?php echo $form->error($model,'fecha'); ?>
		</div><!-- row -->

	<div class="row">
		<?php echo $form->labelEx($model,'kilometraje_inicial'); ?>
		<?php echo $form->textField($model,'kilometraje_inicial'); ?>
		<?php echo $form->error($model,'kilometraje_inicial'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kilometraje_final'); ?>
		<?php echo $form->textField($model,'kilometraje_final'); ?>
		<?php echo $form->error($model,'kilometraje_final'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'litros_adicionales',array('id' => 'asdf')); ?>
		<?php echo $form->textField($model,'litros_adicionales',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'litros_adicionales'); ?>
	</div>
        <div class="row">
            <?php echo $form->labelEx($model,'neto'); ?>
            <?php echo $form->textField($model,'neto',array('size'=>10,'maxlength'=>11)); ?>
            <?php echo $form->error($model,'neto'); ?>
	</div>
        <div class="row">
            <?php echo $form->labelEx($model,'especifico'); ?>
            <?php echo $form->textField($model,'especifico',array('size'=>10,'maxlength'=>11)); ?>
            <?php echo $form->error($model,'especifico'); ?>
	</div>
        <div class="row">
            <?php echo $form->labelEx($model,'costo_empresa'); ?>
            <?php echo $form->textField($model,'costo_empresa',array('size'=>10,'maxlength'=>11)); ?>
            <?php echo $form->error($model,'costo_empresa'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Guardar'),array('class' => 'boton')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->