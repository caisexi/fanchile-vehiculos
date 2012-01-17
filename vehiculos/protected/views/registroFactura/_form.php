<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'registro-factura-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary(array_merge(array($model),$validatedOt)); ?>
                
                <?php echo $form->hiddenField($model, 'id'); ?>
		<div class="row">
		<?php echo $form->labelEx($model,'nro_factura'); ?>
		<?php echo $form->textField($model, 'nro_factura'); ?>
		<?php echo $form->error($model,'nro_factura'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'total_neto'); ?>
		<?php echo $form->textField($model, 'total_neto'); ?>
		<?php echo $form->error($model,'total_neto'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'total_bruto'); ?>
		<?php echo $form->textField($model, 'total_bruto'); ?>
		<?php echo $form->error($model,'total_bruto'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'id_proveedor'); ?>
		<?php echo $form->dropDownList($model, 'id_proveedor', GxHtml::listDataEx(Proveedores::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_proveedor'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
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
		<?php echo $form->error($model,'fecha'); ?>
		</div><!-- row -->

                <?php
                $avehi = GxHtml::listDataEx(Vehiculos::model()->findAllAttributes(null, true));
                $nulo = array('' => '-');
                $union = $nulo + $avehi;
                $otFormConfig = array(
                  'elements'=>array(
                    'nro_guia'=>array(
                        'type'=>'text',
                        'maxlength'=>40,
                    ),
                    'kilometraje'=>array(
                        'type'=>'text',
                        'maxlength'=>40,
                    ),
                    'id_vehiculo'=>array(
                        'type'=>'dropdownlist',
                        //it is important to add an empty item because of new records
                        'items'=>$union,
                    ),
                    'fecha'=>array(              
                        'type'=>'zii.widgets.jui.CJuiDatePicker',
                        //'model' => $model_ot,
			//'attribute' => 'fecha',
                        'language' => 'es',
			//'value' => $model_ot->fecha,
                        //  'language'=>'es',
                        'options'=>array(
                            'showAnim'=>'fold',
                            'dateFormat' => 'yy-mm-dd',
                            
                    )),
                ));
                
                $this->widget('ext.multimodelform.MultiModelForm',array(
                    'id' => 'id_ot', //the unique widget id
                    'formConfig' => $otFormConfig, //the form configuration array
                    'model' => $model_ot, //instance of the form model

                    //if submitted not empty from the controller,
                    //the form will be rendered with validation errors
                    'validatedItems' => $validatedOt,

                    //array of member instances loaded from db
                    'data' => $model_ot->findAll('id_rf=:id_rf', array(':id_rf'=>$model->id)),
                ));
                ?>

<?php
echo GxHtml::submitButton(Yii::t('app',$model->isNewRecord ? 'Create' : 'Save'));
$this->endWidget();
?>
</div><!-- form -->