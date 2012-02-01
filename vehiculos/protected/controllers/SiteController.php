<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
        
        public function actionParcial()
	{
		$dataProvider = new CActiveDataProvider('OrdenTrabajo');
		$this->render('parcial', array(
			'dataProvider' => $dataProvider,
		));
	}
        
        public function actionBparcial()
	{
            $oDbConnection = Yii::app()->db;
            
            $estao = 1;

            $oCommand = $oDbConnection->createCommand('SELECT vehiculos.patente, tipos_vehiculos.nombre as nombretipovehiculo, personal.nombre as nombrepersonal, personal.apellido_pat, areas_empresa.nombre as nombreareaempresa, sum(detalles_ot.subtotal) as reparaciones , (vehiculos.gastoAcumulado + sum(detalles_ot.subtotal)) as acumulado, MIN(orden_trabajo.kilometraje) as inicial, MAX(orden_trabajo.kilometraje) as final, (MAX(orden_trabajo.kilometraje) - MIN(orden_trabajo.kilometraje)) as recorrido , ((vehiculos.gastoAcumulado + sum(detalles_ot.subtotal))/(MAX(orden_trabajo.kilometraje))) as pesoskm from (select * from historial_vehiculos where historial_vehiculos.fecha <= :fechainic ORDER BY historial_vehiculos.fecha DESC) as histo INNER JOIN vehiculos on vehiculos.id = histo.id_vehiculo and vehiculos.estado = :estado INNER JOIN tipos_vehiculos on vehiculos.idTipoVehiculo = tipos_vehiculos.id INNER JOIN personal on personal.id = histo.id_persona INNER JOIN cargos_empresa  on personal.id_cargo_empresa = cargos_empresa.id INNER JOIN areas_empresa on areas_empresa.id = cargos_empresa.id_area_empresa INNER JOIN orden_trabajo on orden_trabajo.id_vehiculo = vehiculos.id INNER JOIN detalles_ot on detalles_ot.id_ot = orden_trabajo.id INNER JOIN registro_factura on orden_trabajo.id_rf = registro_factura.id where registro_factura.fecha >= :fechainic and registro_factura.fecha <= :fechatermn GROUP BY histo.id_vehiculo');

            $oCommand->bindParam(':estado', $estao);
            
            $oCommand->bindParam(':fechainic', $_POST['fecha_inicial']);
            
            $oCommand->bindParam(':fechatermn', $_POST['fecha_termino']);
 
            $oCDbDataReader = $oCommand->queryAll();
            
            $dataProvider=new CArrayDataProvider($oCDbDataReader, array(
                'keyField'=>'patente'
            ));
            
            $this->render('bparcial', array(
                'dataProvider' => $dataProvider,
            ));
        }
        
        public function actionBmensual()
	{
            $oDbConnection = Yii::app()->db;
            
            $estao = 1;

            $oCommand = $oDbConnection->createCommand('SELECT vehiculos.patente, tipos_vehiculos.nombre as nombretipovehiculo, personal.nombre as nombrepersonal, personal.apellido_pat, areas_empresa.nombre as nombreareaempresa, sum(detalles_ot.subtotal) as reparaciones , (vehiculos.gastoAcumulado + sum(detalles_ot.subtotal)) as acumulado, MIN(orden_trabajo.kilometraje) as inicial, MAX(orden_trabajo.kilometraje) as final, (MAX(orden_trabajo.kilometraje) - MIN(orden_trabajo.kilometraje)) as recorrido , ((vehiculos.gastoAcumulado + sum(detalles_ot.subtotal))/(MAX(orden_trabajo.kilometraje))) as pesoskm from (select * from historial_vehiculos where historial_vehiculos.fecha <= :fechainic ORDER BY historial_vehiculos.fecha DESC) as histo INNER JOIN vehiculos on vehiculos.id = histo.id_vehiculo and vehiculos.estado = :estado INNER JOIN tipos_vehiculos on vehiculos.idTipoVehiculo = tipos_vehiculos.id INNER JOIN personal on personal.id = histo.id_persona INNER JOIN cargos_empresa  on personal.id_cargo_empresa = cargos_empresa.id INNER JOIN areas_empresa on areas_empresa.id = cargos_empresa.id_area_empresa INNER JOIN orden_trabajo on orden_trabajo.id_vehiculo = vehiculos.id INNER JOIN detalles_ot on detalles_ot.id_ot = orden_trabajo.id INNER JOIN registro_factura on orden_trabajo.id_rf = registro_factura.id where registro_factura.fecha >= :fechainic and registro_factura.fecha <= :fechatermn GROUP BY histo.id_vehiculo');

            $oCommand->bindParam(':estado', $estao);
            
            $oCommand->bindParam(':fechainic', $_POST['fecha_inicial']);
            
            $oCommand->bindParam(':fechatermn', $_POST['fecha_termino']);
 
            $oCDbDataReader = $oCommand->queryAll();
            
            $dataProvider=new CArrayDataProvider($oCDbDataReader, array(
                'keyField'=>'patente'
            ));
            
            $this->render('bparcial', array(
                'dataProvider' => $dataProvider,
            ));
        }
}