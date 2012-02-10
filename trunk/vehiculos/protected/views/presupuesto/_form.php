<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'presupuesto-form',
	'enableAjaxValidation' => true,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Los campos con'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'son obligatorios'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'ano'); ?>
		<?php echo $form->textField($model, 'ano', array('maxlength' => 4)); ?>
		<?php echo $form->error($model,'ano'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'ppto_anual'); ?>
		<?php echo $form->textField($model, 'ppto_anual',array('onblur'=>'calcularMensual()')); ?>
		<?php echo $form->error($model,'ppto_anual'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'ppto_mensual'); ?>
		<?php echo $form->textField($model, 'ppto_mensual'); ?>
		<?php echo $form->error($model,'ppto_mensual'); ?>
		</div><!-- row -->

<?php
echo GxHtml::submitButton(Yii::t('app', 'Guardar'),array('class' => 'boton'));
$this->endWidget();
?>
</div><!-- form -->

<script type="text/javascript">
    function calcularMensual(){
        document.getElementById('Presupuesto_ppto_mensual').value = Math.round(document.getElementById('Presupuesto_ppto_anual').value / 12);
    } 
</script>