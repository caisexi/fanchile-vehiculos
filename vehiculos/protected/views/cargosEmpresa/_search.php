<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'nombre'); ?>
		<?php echo $form->textField($model, 'nombre', array('maxlength' => 30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'id_area_empresa'); ?>
		<?php echo $form->dropDownList($model, 'id_area_empresa', GxHtml::listDataEx(AreasEmpresa::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Buscar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
