<?php

class SiteController extends GxController
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
		$this->render('parcial');
	}

        public function actionBparcial()
	{
            
            $oDbConnection = Yii::app()->db;

            $oCommand = $oDbConnection->createCommand('SELECT vehiculos.id as id_vehi, personal.id as perso_id, vehiculos.patente, tipos_vehiculos.nombre as nombretipovehiculo, personal.nombre as nombrepersonal, personal.apellido_pat, areas_empresa.nombre as nombreareaempresa, sum(detalles_ot.subtotal) as reparaciones , vehiculos.gastoAcumulado, MAX(orden_trabajo.kilometraje) as recorrido, ((vehiculos.gastoAcumulado)/(MAX(orden_trabajo.kilometraje))) as pesoskm from (select * from historial_vehiculos where historial_vehiculos.fecha <= :fechainic ORDER BY historial_vehiculos.fecha DESC) as histo INNER JOIN vehiculos on vehiculos.id = histo.id_vehiculo and vehiculos.estado = :estado INNER JOIN tipos_vehiculos on vehiculos.idTipoVehiculo = tipos_vehiculos.id INNER JOIN personal on personal.id = histo.id_persona INNER JOIN cargos_empresa  on personal.id_cargo_empresa = cargos_empresa.id INNER JOIN areas_empresa on areas_empresa.id = cargos_empresa.id_area_empresa INNER JOIN orden_trabajo on orden_trabajo.id_vehiculo = vehiculos.id INNER JOIN detalles_ot on detalles_ot.id_ot = orden_trabajo.id INNER JOIN registro_factura on orden_trabajo.id_rf = registro_factura.id where registro_factura.fecha >= :fechainic and registro_factura.fecha <= :fechatermn GROUP BY histo.id_vehiculo ORDER BY vehiculos.patente');

            $oCommand->bindParam(':estado', $estado = 1);
            
            $oCommand->bindParam(':fechainic', $_GET['fecha_inicial']);
            
            $oCommand->bindParam(':fechatermn', $_GET['fecha_termino']);
 
            $oCDbDataReader = $oCommand->queryAll();
            
            $dataProvider=new CArrayDataProvider($oCDbDataReader, array(
                'keyField'=>'patente'
            ));                
            if($_GET['pdf'] == 0)
            {          
                $this->render('bparcial', array(
                    'dataProvider' => $dataProvider,
                    'fechainicial' => $_GET['fecha_inicial'],
                    'fechafinal' => $_GET['fecha_termino'],
                ));
            }
            elseif($_GET['save'] == 1)
            {                
                $dpinf = $dataProvider->getData();
                
                foreach($dpinf as $i=>$dp)
                {
                    $inf[$i] = new InformeParcial();
                    $inf[$i]['id_vehiculo'] = $dp['id_vehi'];
                    $inf[$i]['id_usuario'] = $dp['perso_id'];
                    $inf[$i]['total_reparaciones'] = $dp['reparaciones'];
                    $inf[$i]['total_acumulado'] = $dp['gastoAcumulado'];
                    $inf[$i]['recorrido_parcial'] = $dp['recorrido'];
                    $inf[$i]['pesos_km'] = $dp['pesoskm'];
                    $inf[$i]['fecha_inicial'] = $_GET['fecha_inicial'];
                    $inf[$i]['fecha_final'] = $_GET['fecha_termino'];
                    $inf[$i]->save();
                }
                $this->render('inf', array('cac'=>$inf,'cac1'=>$dpinf));
            }
            else
            {
               $mPDF1 = Yii::app()->ePdf->mPDF();
               $header = array (
                  'odd' => array (
                    'L' => array (
                      'content' => 'FORESTAL ANCHILE LTDA.',
                      'font-size' => 10,
                      'font-style' => 'B',
                      'font-family' => 'serif',
                      'color'=>'#000000'
                    ),
                    'C' => array (
                      'content' => 'RESUMEN PARCIAL DE MANTENCION DE VEHICULOS DESDE EL '.strtoupper(Yii::app()->dateFormatter->formatDateTime(
                    CDateTimeParser::parse(
                        $_GET['fecha_inicial'], 
                        'yyyy-MM-dd'
                    ),
                    'long',null)).' HASTA EL '.strtoupper(Yii::app()->dateFormatter->formatDateTime(
                    CDateTimeParser::parse(
                        $_GET['fecha_termino'], 
                        'yyyy-MM-dd'
                    ),
                    'long',null)),
                      'font-size' => 10,
                      'font-style' => 'B',
                      'font-family' => 'serif',
                      'color'=>'#000000'
                    ),
                    'R' => array (
                      'content' => 'GERENCIA DE ADMINISTRACION',
                      'font-size' => 10,
                      'font-style' => 'B',
                      'font-family' => 'serif',
                      'color'=>'#000000'
                    ),
                    'line' => 1,
                  ),
                  'even' => array ()
                );
                $mPDF1->SetHeader($header);

                $mPDF1->SetFooter('PAGINA {PAGENO}');
                $mPDF1->AddPage('L','','','','','','','','','','','','','','','','','','','','A3-L');
                
                
                
                $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/styles_pdf.css');
                $mPDF1->WriteHTML($stylesheet, 1);
                
                $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/screen_pdf.css');
                $mPDF1->WriteHTML($stylesheet, 1);
        
                $mPDF1->WriteHTML($this->renderPartial('parcialpdf', array('dataProvider' => $dataProvider,
                    'fechainicial' => $_GET['fecha_inicial'],
                    'fechafinal' => $_GET['fecha_termino'],
                    ), true));

                $mPDF1->Output();
            }
        }
}