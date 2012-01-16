<h4 style="color:blue">Drag the panels to order items</h4>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'group-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php
	//show errorsummary at the top for all models
	//build an array of all models to check
	echo $form->errorSummary(array_merge(array($model),$validatedMembers));
?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
<table class="linear" cellspacing="0" >
<?php
	// see http://www.yiiframework.com/doc/guide/1.1/en/form.table
	// Note: Can be a route to a config file too,
	//       or create a method 'getMultiModelForm()' in the member model

	$memberFormConfig = array(
		  'elements'=>array(

              'firstname'=>array(
				'type'=>'text',
				'maxlength'=>40,
			),

		  	'lastname'=>array(
		  		'type'=>'text',
		  		'maxlength'=>40,
		  	),
			'membersince'=>array(
				'type'=>'dropdownlist',
				//it is important to add an empty item because of new records
				'items'=>array(''=>'-',2008=>2008,2009=>2009,2010=>2010,2011=>2011,),
			),
		));

	$this->widget('ext.multimodelform.MultiModelForm',array(
			'id' => 'id_member', //the unique widget id
			'formConfig' => $memberFormConfig, //the form configuration array
			'model' => $member, //instance of the form model

			//if submitted (not empty) from the controller,
			//the form will be rendered with validation errors
			'validatedItems' => $validatedMembers,

	        //array of member instances loaded from db
            //only needed if validatedItems are empty (not in displaying validation errors mode)
			'data' => empty($validatedItems) ? $member->findAll(
                                             array('condition'=>'groupid=:groupId',
                                                   'params'=>array(':groupId'=>$model->id),
                                                   'order'=>'position', //see 'sortAttribute' below
                                                   )) : null,

            'sortAttribute' => 'position', //if assigned: sortable fieldsets is enabled

            'showAddItemOnError' => false, //not allow add items when in validation error mode (default = true)

            //------------ output style ----------------------
           //'tableView' => true, //sortable will not work

            //add position:relative because of embedded removeLinkWrapper with style position:absolute
            'fieldsetWrapper' => array('tag' => 'div',
                'htmlOptions' => array('class' => 'view','style'=>'position:relative;background:#EFEFEF;')
            ),

            'removeLinkWrapper' => array('tag' => 'div',
                'htmlOptions' => array('style'=>'position:absolute; top:1em; right:1em;')
            ),

		));
?>
</table>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->