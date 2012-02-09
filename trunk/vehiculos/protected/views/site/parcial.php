<div class="form">
    <?php echo CHtml::beginForm('bparcial','get'); ?>

    <div class="row">
        <?php echo CHtml::Label('Fecha Inicio','fecha_inicial'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'fecha_inicial',
            'language' => 'es',
            'options' => array(
                    'showButtonPanel' => true,
                    'changeYear' => true,
                    'dateFormat' => 'yy-mm-dd',
                    ),
            ));
        ; ?>
    </div>
    <?php echo CHtml::hiddenField('pdf',0); ?>
    <?php echo CHtml::hiddenField('save',0); ?>
    <div class="row">
        <?php echo CHtml::Label('Fecha Termino','fecha_termino'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'fecha_termino',
            'language' => 'es',
            'options' => array(
                    'showButtonPanel' => true,
                    'changeYear' => true,
                    'dateFormat' => 'yy-mm-dd',
                    ),
            ));
        ; ?>
    </div>
    
    <div class="row submit">
        <?php echo GxHtml::submitButton(Yii::t('app', 'Consultar'),array('class' => 'boton')); ?>
    </div>
    
<?php echo CHtml::endForm(); ?>
    
</div><!-- form -->