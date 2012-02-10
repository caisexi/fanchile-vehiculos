<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="es" />
        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico" type="image/x-icon" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    
</head>

<body>

<div class="container" id="page">

    <div id="header">

    </div><!-- header -->
<?php
        setlocale(LC_ALL, 'es_CL');
	$jqueryslidemenupath = Yii::app()->assetManager->publish(Yii::app()->basePath.'/scripts/jqueryslidemenu/');
	
	//Register jQuery, JS and CSS files
	Yii::app()->clientScript->registerCoreScript('jquery');
	Yii::app()->clientScript->registerCssFile($jqueryslidemenupath.'/jqueryslidemenu.css');	
	Yii::app()->clientScript->registerScriptFile($jqueryslidemenupath.'/jqueryslidemenu.js');
?>
	<div id="myslidemenu" class="jqueryslidemenu">
	<!-- <div id="mainmenu"> -->
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array
			(
				array('label'=>'Inicio', 'url'=>array('/site/index')),
				array('label'=>'Registros', 'url'=>array('#'), 'items'=>array
				(
					array('label'=>'Factura', 'url'=>array('/registrofactura/ ')),
					array('label'=>'Orden de trabajo', 'url'=>array('/ordentrabajo/ ')),
                                        array('label'=>'Historial Vehiculo', 'url'=>array('/historialvehiculos/ ')),
                                        array('label'=>'Ingreso Presupuestario', 'url'=>array('/presupuesto/ ')),
								
				)),
                                array('label'=>'Administrar', 'url'=>array('#'), 'items'=>array
					(
						array('label'=>'Vehiculos', 'url'=>array('#'), 'items'=>array
						(
                                                        array('label'=>'Vehiculos', 'url'=>array('/vehiculos/ ')),
							array('label'=>'Colores', 'url'=>array('/coloresvehiculos/ ')),
							array('label'=>'Marcas', 'url'=>array('/marcasvehiculos/ ')),
							array('label'=>'Modelos', 'url'=>array('/modelosvehiculos/ ')),
                                                        array('label'=>'Combustibles', 'url'=>array('/combustibles/ ')),
                                                        array('label'=>'Tipos', 'url'=>array('/tiposvehiculos/ ')),
						)),
                                                array('label'=>'Proveedores', 'url'=>array('#'), 'items'=>array
						(
                                                    array('label'=>'Proveedores', 'url'=>array('/proveedores/ ')),
                                                    array('label'=>'Ciudades', 'url'=>array('/ciudades/ ')),
                                                )),
                                                array('label'=>'Personal', 'url'=>array('#'), 'items'=>array
						(
                                                        array('label'=>'Personal', 'url'=>array('/personal/ ')),
                                                        array('label'=>'Cargos', 'url'=>array('/cargosempresa/ ')),
							array('label'=>'Areas', 'url'=>array('/areasempresa/ ')),
						)),
                                                array('label'=>'Marcas Repuestos', 'url'=>array('/marcasrepuestos/ ')),
                                                array('label'=>'Ivas', 'url'=>array('/ivas/ ')),
                                                array('label'=>'Detalles de reparacion', 'url'=>array('/detallereparacion/ ')),
                                                array('label'=>'Usuarios', 'url'=>array('/usuarios/ ')),
                                                
					)),
                                array('label'=>'Informes', 'url'=>array('#'), 'items'=>array
					(
						array('label'=>'Mantenciones', 'url'=>array('#'), 'items'=>array
						(
                                                        array('label'=>'Parcial', 'url'=>array('/site/parcial')),
							array('label'=>'Mensual', 'url'=>array('#')),
						)),                                                
					)),
				array('label'=>'Entrar', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Salir ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
		<br style="clear: left" />
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
                        'homeLink' => CHtml::link('Inicio', Yii::app()->homeUrl),
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> Forestal Anchile LTDA.<br/>
		Todos los derechos reservados.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
