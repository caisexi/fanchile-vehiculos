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
        
        <?php echo $form->labelEx($model,'idCombustible'); ?>
        
        <?php echo $form->hiddenField($model, 'idCombustible'); ?>
        
        <?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'model'=>$model,
            'attribute'=>'idCombustible0',
            'source'=>$this->createUrl('vehiculos/ACCombustibles'),
            'options'=>array(
                'showAnim'=>'fold',
		'minLength'=>'1',
		'select'=>'js:function(event, ui) { $("#Vehiculos_idCombustible").val(ui.item.id);}'
            ),
        ));
        ?>
        
        <?php echo $form->labelEx($model,'idTipoVehiculo'); ?>
        
        <?php echo $form->hiddenField($model, 'idTipoVehiculo'); ?>
        
        <?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'model'=>$model,
            'attribute'=>'idTipoVehiculo0',
            'source'=>$this->createUrl('vehiculos/ACTiposVehiculos'),
            'options'=>array(
                'showAnim'=>'fold',
		'minLength'=>'1',
		'select'=>'js:function(event, ui) { console.log(ui.item); $("#TiposVehiculos").val(ui.item.label); $("#Vehiculos_idTipoVehiculo").val(ui.item.id); return false; }'
            ),
        ));
        ?>
        
        <?php echo $form->labelEx($model,'idProveedor'); ?>
        
        <?php echo $form->hiddenField($model, 'idProveedor'); ?>
        
        <?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'model'=>$model,
            'attribute'=>'idProveedor0',
            'source'=>$this->createUrl('vehiculos/ACProveedor'),
            'options'=>array(
                'showAnim'=>'fold',
		'minLength'=>'1',
		'select'=>'js:function(event, ui) { console.log(ui.item); $("#Proveedor").val(ui.item.label); $("#Vehiculos_idProveedor").val(ui.item.id); return false; }'
            ),
        ));
        ?>
        
        <?php echo $form->labelEx($model,'idMarca'); ?>
        
        <?php echo $form->hiddenField($model, 'idMarca'); ?>
        
        <?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'model'=>$model,
            'attribute'=>'idMarca0',
            'source'=>$this->createUrl('vehiculos/ACMarca'),
            'options'=>array(
                'showAnim'=>'fold',
		'minLength'=>'1',
		'select'=>'js:function(event, ui) { console.log(ui.item); $("#Marca").val(ui.item.label); $("#Vehiculos_idMarca").val(ui.item.id); return false; }'
            ),
        ));
        ?>
        
        <div class="row">
        <?php echo $form->labelEx($model,'idModelo'); ?>
                
        <?php echo $form->hiddenField($model, 'idModelo'); ?>
        
        <?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'model'=>$model,
            'attribute'=>'idModelo0',
            'source'=>$this->createUrl('vehiculos/ACModelo'),
            'options'=>array(
                'showAnim'=>'fold',
		'minLength'=>'1',
		'select'=>'js:function(event, ui) { console.log(ui.item); $("#Modelo").val(ui.item.label); $("#Vehiculos_idModelo").val(ui.item.id); return false; }'
            ),
        ));
        ?>        
        <?php echo $form->error($model,'idModelo'); ?>
        </div>
        
        <?php echo $form->labelEx($model,'idColor'); ?>
        
        <?php echo $form->hiddenField($model, 'idColor'); ?>
        
        <?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'model'=>$model,
            'attribute'=>'idColor0',
            'source'=>$this->createUrl('vehiculos/ACColor'),
            'options'=>array(
                'showAnim'=>'fold',
		'minLength'=>'1',
		'select'=>'js:function(event, ui) { console.log(ui.item); $("#Color").val(ui.item.label); $("#Vehiculos_idColor").val(ui.item.id); return false; }'
            ),
            'htmlOptions'=>array(
                'style'=>'width:100px;'
            ),
        ));
        ?>
        
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
            <?php echo $form->labelEx($model,'estado'); ?>
            <?php echo $form->dropDownList($model, 'estado', array(0 => 'EN VENTA',1 =>'EN USO',2 => 'VENDIDO')); ?>
            <?php echo $form->error($model,'estado'); ?>
	</div><!-- row -->
       
<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->