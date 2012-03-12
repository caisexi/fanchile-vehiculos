<?php

$this->breadcrumbs = array(Yii::t('app', 'Subir Planilla'));

?>
<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>
<div class="form">
<?php echo CHtml::beginForm('subir','post',array('enctype' => 'multipart/form-data')); ?>
    <div class="row">
        <?php echo CHtml::label('Cargar Archivo','subir'); ?>
        <?php echo CHtml::fileField('excel', '', array('style' => 'width:400px')); ?>
        <?php echo CHtml::hiddenField('action','upload'); ?>
    </div><!-- row -->
    <div class="row">        
        <?php echo CHtml::label('Impuesto Especifico','subir'); ?>
        <?php echo CHtml::textField('especifico'); ?>
        <span class="required">*</span><?php echo Yii::t('app', 'Solo gasolina'); ?>
    </div><!-- row -->
    <div class="row">
        <?php echo CHtml::label('Sobreescribir si existe','sobreescribir'); ?>
        <?php echo CHtml::checkBox('sobreescribir'); ?>
    </div><!-- row -->

    <?php
        echo GxHtml::submitButton(Yii::t('app', 'Subir'),array('class' => 'boton'));
        echo CHtml::endForm();
        if(isset ($diesel)){
            foreach($diesel as $di){
            print_r($di->attributes);
            print_r($di->errors);            
            }
        }
        if(isset ($gasolina)){
            foreach($gasolina as $ga){
            print_r($ga->attributes);
            print_r($ga->errors);            
            }
        }
        if(isset($invalido))
            print_r($invalido);
        if(isset($planilla))
        {
            print_r($planilla->attributes);
            print_r($planilla->errors);
        }
    ?>
</div><!-- form -->
