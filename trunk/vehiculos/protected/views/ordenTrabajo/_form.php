<div class="form wide">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'orden-trabajo-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary(array_merge(array($model),$detallesValidados)); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'nro_guia'); ?>
		<?php echo $form->textField($model, 'nro_guia'); ?>
		<?php echo $form->error($model,'nro_guia'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'id_vehiculo'); ?>
		<?php echo $form->dropDownList($model, 'id_vehiculo', GxHtml::listDataEx(Vehiculos::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_vehiculo'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'id_rf'); ?>
		<?php echo $form->dropDownList($model, 'id_rf', GxHtml::listDataEx(RegistroFactura::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_rf'); ?>
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
		<div class="row">
		<?php echo $form->labelEx($model,'kilometraje'); ?>
		<?php echo $form->textField($model, 'kilometraje', array('maxlength' => 7)); ?>
		<?php echo $form->error($model,'kilometraje'); ?>
		</div><!-- row -->
                
                <?php
                $this->widget('ext.multimodelform.MultiModelForm',array(
                    'id' => 'id_member', //the unique widget id
                    'formConfig' => OrdenTrabajo::model()->getMultiModelForm(), //the form configuration array
                    'model' => $detalle, //instance of the form model
                    'tableView' => true,

                    //if submitted not empty from the controller,
                    //the form will be rendered with validation errors
                    'validatedItems' => $detallesValidados,

                    //array of member instances loaded from db
                    'data' => $detalle->findAll('id_ot=:id_Ot', array(':id_Ot'=>$model->id)),
                ));
                ?>
                <input type="button" value="Calcular Subtotales" onclick="subtotal()">
<?php
echo GxHtml::submitButton(Yii::t('app', 'Guardar'));
$this->endWidget();
?>
</div><!-- form -->

<script type="text/javascript">
function subtotal(){    
    existe = true;
    existe2 = true;

    pu = 'precio_unitario';
    cant = 'cantidad';
    sub = 'subtotal';
    
    deta = 'DetallesOt_';
    
    update = 'u___';

    i=1;
    i_b=0;
    
    while(existe2){    
        try{
            pu_b = deta+i_b.toString()+update+pu;
            cant_b = deta+i_b.toString()+update+cant;
            sub_b = deta+i_b.toString()+update+sub;
            if(document.getElementById(pu_b).value != ''){
                document.getElementById(sub_b).value = document.getElementById(pu_b).value * document.getElementById(cant_b).value;
            }
            i_b = i_b + 1;
            //alert(sub);
        }catch(e){
           existe2 = false;
        }
    }
    while(existe){    
        try{
            pu_a = deta+i_b.toString()+pu;
            cant_a = deta+i_b.toString()+cant;
            sub_a = deta+i_b.toString()+sub;
            if(document.getElementById(pu_a).value != ''){
                document.getElementById(sub_a).value = document.getElementById(pu_a).value * document.getElementById(cant_a).value;
            }
            i = i + 1;
            pu_a = pu+i.toString();
            cant_a = cant+i.toString();
            sub_a = sub+i.toString();
            //alert(sub);
        }catch(e){
           existe = false;
        }
    }
}
</script>