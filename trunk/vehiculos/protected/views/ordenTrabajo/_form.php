<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'orden-trabajo-form',
	'enableAjaxValidation' => false,
    
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Los campos con'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'son obligatorios'); ?>.
	</p>

	<?php echo $form->errorSummary(array_merge(array($model),$detallesValidados)); ?>
        

		<div class="row">
		<?php echo $form->labelEx($model,'nro_guia'); ?>
		<?php echo $form->textField($model, 'nro_guia'); ?>
		<?php echo $form->error($model,'nro_guia'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'id_vehiculo'); ?>
                <?php echo $form->hiddenField($model, 'id_vehiculo'); ?>
                <?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                    'model'=>$model,
                    'attribute'=>'idVehiculo',
                    'source'=>$this->createUrl('ordentrabajo/ACVehi'),
                    'options'=>array(
                        'showAnim'=>'fold',
                        'minLength'=>'1',
                        'select'=>'js:function(event, ui) { $("#OrdenTrabajo_id_vehiculo").val(ui.item.id);}'
                    ),
                ));
                ?>
		</div><!-- row -->
		<div class="row">
                <?php echo $form->labelEx($model,'id_rf'); ?>
                <?php 
                if (isset($_GET['factura']) && isset($_GET['id']))
                {
                    echo $form->hiddenField($model, 'id_rf',array('value'=>$_GET['id']));
                    $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                    'model'=>$model,
                    'attribute'=>'idRf',                    
                    'source'=>$this->createUrl('ordentrabajo/ACRf'),
                    'htmlOptions'=>array('value'=>$_GET['factura']),
                    'options'=>array(
                        'showAnim'=>'fold',
                        'minLength'=>'1',
                        'select'=>'js:function(event, ui) { $("#OrdenTrabajo_id_rf").val(ui.item.id);}'
                    ),
                ));
                }
                else
                {
                ?>
                <?php echo $form->hiddenField($model, 'id_rf'); ?>
                <?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                    'model'=>$model,
                    'attribute'=>'idRf',                    
                    'source'=>$this->createUrl('ordentrabajo/ACRf'),
                    'options'=>array(
                        'showAnim'=>'fold',
                        'minLength'=>'1',
                        'select'=>'js:function(event, ui) { $("#OrdenTrabajo_id_rf").val(ui.item.id);}'
                    ),
                ));
                }
                ?>
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
                
                <div class="row">
                    <?php echo CHtml::label('Valores con :','valores'); ?>
                    <?php echo CHtml::radioButtonList('valores','',array('1' => 'Con Iva', '2' => 'Sin Iva'),array('onChange' => 'subtotal()')); ?>
                </div> 
                
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
                
<?php
echo GxHtml::submitButton(Yii::t('app', 'Guardar'),array('class' => 'boton'));
$this->endWidget();
?>
</div><!-- form -->

<script type="text/javascript">
function subtotal(){    
    existe = true;
    existe2 = true;
    existe3 = true;

    pu = '_precio_unitario';
    cant = '_cantidad';
    sub = '_subtotal';    
    deta = 'DetallesOt';
    
    pu_a = deta+pu;
    cant_a = deta+cant;
    sub_a = deta+sub;
    
    update = '_u___';
    error = '_n___';

    i_a=1;
    i_b=0;
    i_c=0;
    
    while(existe2){    
        try{
            pu_b = deta+update+i_b.toString()+pu;
            cant_b = deta+update+i_b.toString()+cant;
            sub_b = deta+update+i_b.toString()+sub;
            if(document.getElementById(pu_b).value != ''){
                if(document.getElementById(cant_b).value == '')
                    document.getElementById(cant_b).value = 1;
                if(valores_0.checked)
                    document.getElementById(sub_b).value = Math.round((document.getElementById(pu_b).value / 1.19) * document.getElementById(cant_b).value);
                else
                    document.getElementById(sub_b).value = document.getElementById(pu_b).value * document.getElementById(cant_b).value;
            }
            i_b = i_b + 1;
        }catch(e){
           existe2 = false;
        }
    }
    while(existe3){    
        try{
            pu_c = deta+error+i_c.toString()+pu;
            cant_c = deta+error+i_c.toString()+cant;
            sub_c = deta+error+i_c.toString()+sub;
            if(document.getElementById(pu_c).value != ''){
                if(document.getElementById(cant_c).value == '')
                    document.getElementById(cant_c).value = 1;
                if(valores_0.checked)
                    document.getElementById(sub_c).value = Math.round((document.getElementById(pu_c).value / 1.19) * document.getElementById(cant_c).value);
                else
                    document.getElementById(sub_c).value = document.getElementById(pu_c).value * document.getElementById(cant_c).value;
            }
            i_c = i_c + 1;
        }catch(e){
           existe3 = false;
        }
    }
    while(existe){    
        try{
            
            if(document.getElementById(pu_a).value != ''){
                if(document.getElementById(cant_a).value == '')
                    document.getElementById(cant_a).value = 1;
                if(valores_0.checked)
                    document.getElementById(sub_a).value = Math.round((document.getElementById(pu_a).value / 1.19) * document.getElementById(cant_a).value);
                else
                    document.getElementById(sub_a).value = document.getElementById(pu_a).value * document.getElementById(cant_a).value;
            }
            i_a = i_a + 1;
            pu_a = deta+pu+i_a.toString();
            cant_a = deta+cant+i_a.toString();
            sub_a = deta+sub+i_a.toString();
        }catch(e){
           existe = false;
        }
    }
}
</script>