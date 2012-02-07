<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'historial-vehiculos-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Los campos con'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'son obligatorios'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>
        
                <div class="row">
                
                <?php echo $form->labelEx($model,'id_vehiculo'); ?>
        
                <?php echo $form->hiddenField($model, 'id_vehiculo'); ?>

                <?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                    'model'=>$model,
                    'attribute'=>'idVehiculo',
                    'source'=>$this->createUrl('historialvehiculos/ACPatente'),
                    'options'=>array(
                        'showAnim'=>'fold',
                        'minLength'=>'1',
                        'select'=>'js:function(event, ui) { $("#HistorialVehiculos_id_vehiculo").val(ui.item.id);}'
                    ),
                ));
                ?>
                </div><!-- row -->
		
		<div class="row">
                <?php echo $form->labelEx($model,'id_persona'); ?>
        
                <?php echo $form->hiddenField($model, 'id_persona'); ?>

                <?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                    'model'=>$model,
                    'attribute'=>'idPersona',
                    'source'=>$this->createUrl('personal/ACPersona'),
                    'options'=>array(
                        'showAnim'=>'fold',
                        'minLength'=>'1',
                        'select'=>'js:function(event, ui) { $("#HistorialVehiculos_id_persona").val(ui.item.id);}'
                    ),
                ));
                ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'fecha',
			'value' => $model->fecha,
                        'language'=>'es',
			'options' => array(
				'showButtonPanel' => true,
				'changeYear' => true,
				'dateFormat' => 'yy-mm-dd',
				),
			));
; ?>
		<?php echo $form->error($model,'fecha'); ?>
		</div><!-- row -->



<?php
echo GxHtml::submitButton(Yii::t('app', 'Guardar'),array('class' => 'boton'));
$this->endWidget();
?>
</div><!-- form -->