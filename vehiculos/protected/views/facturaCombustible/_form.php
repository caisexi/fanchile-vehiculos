<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'factura-combustible-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Los campos con'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'son obligatorios'); ?>.
	</p>

	<?php echo $form->errorSummary(array_merge(array($model),$detallesValidados)); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'nro_factura'); ?>
		<?php echo $form->textField($model, 'nro_factura', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'nro_factura'); ?>
		</div><!-- row -->
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
		<?php echo $form->labelEx($model,'id_combustible'); ?>
		<?php echo $form->dropDownList($model, 'id_combustible', GxHtml::listDataEx(Combustibles::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'id_combustible'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'neto'); ?>
		<?php echo $form->textField($model, 'neto',array('onblur'=>'calcularIva(),calcularTotal();')); ?>
		<?php echo $form->error($model,'neto'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'iva'); ?>
                <?php echo CHtml::hiddenField('hiva',Ivas::model()->findBySql('SELECT valor_iva FROM ivas ORDER BY fecha DESC')); ?>
		<?php echo $form->textField($model, 'iva'); ?>
		<?php echo $form->error($model,'iva'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'especifico'); ?>
		<?php echo $form->textField($model, 'especifico',array('onblur'=>'calcularTotal()')); ?>
		<?php echo $form->error($model,'especifico'); ?>
		</div><!-- row -->		
                <?php
                $this->widget('ext.multimodelform.MultiModelForm',array(
                    'id' => 'id_detfactcomb', //the unique widget id
                    'formConfig' => FacturaCombustible::model()->getMultiModelForm(), //the form configuration array
                    'model' => $detalle, //instance of the form model
                    'tableView' => true,

                    //if submitted not empty from the controller,
                    //the form will be rendered with validation errors
                    'validatedItems' => $detallesValidados,

                    //array of member instances loaded from db
                    'data' => $detalle->findAll('id_factura_combustible=:id_factura_combustible', array(':id_factura_combustible'=>$model->id)),
                ));
                ?>
                <div class="row">
		<?php echo $form->labelEx($model,'litros'); ?>
		<?php echo $form->textField($model, 'litros', array('maxlength' => 10)); ?>
		<?php echo $form->error($model,'litros'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'total'); ?>
		<?php echo $form->textField($model, 'total'); ?>
		<?php echo $form->error($model,'total'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'valor_lt'); ?>
		<?php echo $form->textField($model, 'valor_lt'); ?>
		<?php echo $form->error($model,'valor_lt'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'valor_guia'); ?>
		<?php echo $form->textField($model, 'valor_guia'); ?>
		<?php echo $form->error($model,'valor_guia'); ?>
		</div><!-- row -->
<?php
echo GxHtml::submitButton(Yii::t('app', 'Guardar'),array('class' => 'boton'));
$this->endWidget();
?>
</div><!-- form -->

<script type="text/javascript">
function calcularIva(){
    document.getElementById('FacturaCombustible_iva').value = Math.round(document.getElementById('FacturaCombustible_neto').value * (document.getElementById('hiva').value / 100));
}

function calcularTotal(){
    document.getElementById('FacturaCombustible_total').value = parseInt(document.getElementById('FacturaCombustible_neto').value) + parseInt(document.getElementById('FacturaCombustible_iva').value) + parseInt(document.getElementById('FacturaCombustible_especifico').value);
    document.getElementById('FacturaCombustible_valor_lt').value = Math.round((parseInt(document.getElementById('FacturaCombustible_neto').value) + parseInt(document.getElementById('FacturaCombustible_especifico').value)) / document.getElementById('FacturaCombustible_litros').value);
    document.getElementById('FacturaCombustible_valor_guia').value = parseInt(document.getElementById('FacturaCombustible_neto').value) + parseInt(document.getElementById('FacturaCombustible_especifico').value);
}

function totallitros(){
    existe = true;
    existe2 = true;
    existe3 = true;

    litr = '_litros';
    deta = 'DetFacturaCombustible';
    
    pu_a = deta+litr;
    
    update = '_u___';
    error = '_n___';
    
    litros = 0;

    i_a=1;
    i_b=0;
    i_c=0;
    
    while(existe2){    
        try{
            pu_b = deta+update+i_b.toString()+litr;
            if(document.getElementById(pu_b).value != ''){
                litros = litros + parseFloat(document.getElementById(pu_b).value);
            }
            i_b = i_b + 1;
        }catch(e){
           existe2 = false;
        }
    }
    while(existe3){    
        try{
            pu_c = deta+error+i_c.toString()+litr;
            if(document.getElementById(pu_c).value != ''){
                litros = litros + parseFloat(document.getElementById(pu_c).value);
            }
            i_c = i_c + 1;
        }catch(e){
           existe3 = false;
        }
    }
    while(existe){    
        try{
            
            if(document.getElementById(pu_a).value != ''){
                litros = litros + parseFloat(document.getElementById(pu_a).value);
            }
            i_a = i_a + 1;
            pu_a = deta+litr+i_a.toString();
        }catch(e){
           existe = false;
        }
    }
    document.getElementById('FacturaCombustible_litros').value = litros;
}
</script>