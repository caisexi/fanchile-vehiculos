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
		<?php echo $form->textField($model, 'neto',array('onblur'=>'calcularIva();')); ?>
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
		<div class="row">
		<?php echo $form->labelEx($model,'litros'); ?>
		<?php echo $form->textField($model, 'litros', array('maxlength' => 10,'onblur'=>'calcularTotal()')); ?>
		<?php echo $form->error($model,'litros'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'total'); ?>
		<?php echo $form->textField($model, 'total'); ?>
		<?php echo $form->error($model,'total'); ?>
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
    document.getElementById('FacturaCombustible_valor_guia').value = parseInt(document.getElementById('FacturaCombustible_neto').value) + parseInt(document.getElementById('FacturaCombustible_iva').value);
}
</script>