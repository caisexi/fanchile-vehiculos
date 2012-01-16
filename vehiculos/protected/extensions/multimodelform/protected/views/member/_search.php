<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'groupid'); ?>
		<?php echo $form->textField($model,'groupid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'firstname'); ?>
		<?php echo $form->textField($model,'firstname',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lastname'); ?>
		<?php echo $form->textField($model,'lastname',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'membersince'); ?>
		<?php echo $form->textField($model,'membersince'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'position'); ?>
		<?php echo $form->textField($model,'position'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->