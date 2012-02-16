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
                $this->layout = '//layouts/pg';
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
            
        public function actionProgresogasto()
        {
            $this->layout = '//layouts/pg';
            if(isset($_GET['anio']))
            {
                $oDbConnection = Yii::app()->db;
                if(!isset ($_GET['patente']))
                {
                    if(isset($_GET['uso']) && $_GET['uso'] == 1)
                        if(!isset($sql))
                            $sql = "AND (vehiculos.estado = '1'";
                    if(isset($_GET['venta']) && $_GET['venta'] == 1)
                        if(!isset($sql))
                            $sql = "AND (vehiculos.estado = '0'";
                        else
                            $sql .= " OR vehiculos.estado = '0'";
                    if(isset($_GET['vendido']) && $_GET['vendido'] == 1)
                        if(!isset($sql))
                            $sql = "AND (vehiculos.estado = '2'";
                        else
                            $sql .= " OR vehiculos.estado = '2'";
                    if(isset($sql))
                    {
                        $sql .= ')';
                        $oCommand = $oDbConnection->createCommand('select SUM(detalles_ot.subtotal) as gastoMensual, MONTH(registro_factura.fecha) as mes from detalles_ot INNER JOIN orden_trabajo on orden_trabajo.id = detalles_ot.id_ot INNER JOIN registro_factura on registro_factura.id = orden_trabajo.id_rf INNER JOIN vehiculos on vehiculos.id = orden_trabajo.id_vehiculo where YEAR(registro_factura.fecha) = :anio '.$sql.' GROUP BY MONTH(registro_factura.fecha)');
                    }
                    else
                        $oCommand = $oDbConnection->createCommand('select SUM(detalles_ot.subtotal) as gastoMensual, MONTH(registro_factura.fecha) as mes from detalles_ot INNER JOIN orden_trabajo on orden_trabajo.id = detalles_ot.id_ot INNER JOIN registro_factura on registro_factura.id = orden_trabajo.id_rf INNER JOIN vehiculos on vehiculos.id = orden_trabajo.id_vehiculo where YEAR(registro_factura.fecha) = :anio GROUP BY MONTH(registro_factura.fecha)');
                    
                }else
                {
                    $oCommand = $oDbConnection->createCommand('select SUM(detalles_ot.subtotal) as gastoMensual, MONTH(registro_factura.fecha) as mes from detalles_ot INNER JOIN orden_trabajo on orden_trabajo.id = detalles_ot.id_ot INNER JOIN registro_factura on registro_factura.id = orden_trabajo.id_rf INNER JOIN vehiculos on vehiculos.id = orden_trabajo.id_vehiculo where YEAR(registro_factura.fecha) = :anio AND vehiculos.patente = :patente GROUP BY MONTH(registro_factura.fecha)');
                    $oCommand->bindParam(':patente', $_GET['patente']);
                }
                $oCommand->bindParam(':anio', $_GET['anio']);
                $oCDbDataReader = $oCommand->queryAll();

                $dataProvider=new CArrayDataProvider($oCDbDataReader, array(
                    'keyField'=>'mes'
                ));  
                $this->render('pg', array(
                    'dataProvider' => $dataProvider,
                    'anio'=>$_GET['anio'],
                ));
            }
            else
            {
                $this->render('pg');
            }
        }
        
        public function actionBmensual()
	{
            $this->layout = '//layouts/pg';
            if(isset ($_GET['mes']))
            {                
                $oDbConnection = Yii::app()->db;

                $oCommand = $oDbConnection->createCommand('SELECT vehiculos.patente, tipos_vehiculos.nombre as nombretipovehiculo, combustibles.nombre as combu , personal.nombre as nombrepersonal, personal.apellido_pat, areas_empresa.nombre as nombreareaempresa, sum(detalles_ot.subtotal) as reparaciones , vehiculos.gastoAcumulado, MAX(orden_trabajo.kilometraje) as recorrido, det_factura_combustible.litros as litros, factura_combustible.valor_lt costocombustible, (MAX(orden_trabajo.kilometraje)/det_factura_combustible.litros) as kmlitros, ((vehiculos.gastoAcumulado)/(MAX(orden_trabajo.kilometraje))) as pesoskm from (select * from historial_vehiculos where historial_vehiculos.fecha <= :anomes ORDER BY historial_vehiculos.fecha DESC limit 1) as histo INNER JOIN vehiculos on vehiculos.id = histo.id_vehiculo and vehiculos.estado = :estado INNER JOIN tipos_vehiculos on vehiculos.idTipoVehiculo = tipos_vehiculos.id INNER JOIN combustibles on combustibles.id = vehiculos.idCombustible INNER JOIN personal on personal.id = histo.id_persona INNER JOIN cargos_empresa on personal.id_cargo_empresa = cargos_empresa.id INNER JOIN areas_empresa on areas_empresa.id = cargos_empresa.id_area_empresa INNER JOIN orden_trabajo on orden_trabajo.id_vehiculo = vehiculos.id INNER JOIN detalles_ot on detalles_ot.id_ot = orden_trabajo.id INNER JOIN registro_factura on orden_trabajo.id_rf = registro_factura.id INNER JOIN factura_combustible INNER JOIN det_factura_combustible on det_factura_combustible.id_factura_combustible = factura_combustible.id where MONTH(registro_factura.fecha) = :mes AND YEAR(registro_factura.fecha) = :ano GROUP BY histo.id_vehiculo ORDER BY vehiculos.patente');

                $oCommand->bindParam(':estado', $estado = 1);

                $oCommand->bindParam(':mes', $_GET['mes']);
                
                $oCommand->bindParam(':ano', $_GET['ano']);
                
                $oCommand->bindParam(':anomes', $anomes = $_GET['ano'].'-'.$_GET['mes']);

                $oCDbDataReader = $oCommand->queryAll();

                $dataProvider=new CArrayDataProvider($oCDbDataReader, array(
                    'keyField'=>'patente'
                ));
                if(!isset($_GET['pdf']))
                {          
                    $this->render('bmensual', array(
                        'dataProvider' => $dataProvider,
                        'mes' => $_GET['mes'],
                        'ano' => $_GET['ano'],
                    ));
                }
                else
                {
                    switch($_GET['mes']){
                       case 1: $mes_letra = 'Enero'; break;
                       case 2: $mes_letra = 'Febrero'; break; 
                       case 3: $mes_letra = 'Marzo'; break; 
                       case 4: $mes_letra = 'Abril'; break; 
                       case 5: $mes_letra = 'Mayo'; break; 
                       case 6: $mes_letra = 'Junio'; break; 
                       case 7: $mes_letra = 'Julio'; break; 
                       case 8: $mes_letra = 'Agosto'; break;
                       case 9: $mes_letra = 'Septiembre'; break; 
                       case 10: $mes_letra = 'Octubre'; break; 
                       case 11: $mes_letra = 'Noviembre'; break; 
                       case 12: $mes_letra = 'Diciembre'; break; 
                   }
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
                          'content' => 'RESUMEN MENSUAL DE MANTENCION DE VEHICULOS DE '.strtoupper($mes_letra).' DEL '.strtoupper($_GET['ano']),
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

                    $mPDF1->WriteHTML($this->renderPartial('mensualpdf', array('dataProvider' => $dataProvider,
                        'mes' => $_GET['mes'],
                        'ano' => $_GET['ano'],
                        ), true));

                    $mPDF1->Output();
                }
            }
            else
            {
                $this->render('bmensual');
            }
        }
        public function actionBparcial()
	{
            $this->layout = '//layouts/pg';
            if(isset ($_GET['fecha_inicial']) && isset ($_GET['fecha_termino']))
            {                
                $oDbConnection = Yii::app()->db;

                $oCommand = $oDbConnection->createCommand('SELECT vehiculos.id as id_vehi, personal.id as perso_id, vehiculos.patente, tipos_vehiculos.nombre as nombretipovehiculo, personal.nombre as nombrepersonal, personal.apellido_pat, areas_empresa.nombre as nombreareaempresa, sum(detalles_ot.subtotal) as reparaciones , vehiculos.gastoAcumulado, MAX(orden_trabajo.kilometraje) as recorrido, ((vehiculos.gastoAcumulado)/(MAX(orden_trabajo.kilometraje))) as pesoskm from (select * from historial_vehiculos where historial_vehiculos.fecha <= :fechatermn ORDER BY historial_vehiculos.fecha DESC limit 1) as histo INNER JOIN vehiculos on vehiculos.id = histo.id_vehiculo and vehiculos.estado = :estado INNER JOIN tipos_vehiculos on vehiculos.idTipoVehiculo = tipos_vehiculos.id INNER JOIN personal on personal.id = histo.id_persona INNER JOIN cargos_empresa  on personal.id_cargo_empresa = cargos_empresa.id INNER JOIN areas_empresa on areas_empresa.id = cargos_empresa.id_area_empresa INNER JOIN orden_trabajo on orden_trabajo.id_vehiculo = vehiculos.id INNER JOIN detalles_ot on detalles_ot.id_ot = orden_trabajo.id INNER JOIN registro_factura on orden_trabajo.id_rf = registro_factura.id where registro_factura.fecha >= :fechainic and registro_factura.fecha <= :fechatermn GROUP BY histo.id_vehiculo ORDER BY vehiculos.patente');

                $oCommand->bindParam(':estado', $estado = 1);

                $oCommand->bindParam(':fechainic', $_GET['fecha_inicial']);

                $oCommand->bindParam(':fechatermn', $_GET['fecha_termino']);

                $oCDbDataReader = $oCommand->queryAll();

                $dataProvider=new CArrayDataProvider($oCDbDataReader, array(
                    'keyField'=>'patente'
                ));
                if(!isset($_GET['pdf']))
                {          
                    $this->render('bparcial', array(
                        'dataProvider' => $dataProvider,
                        'fechainicial' => $_GET['fecha_inicial'],
                        'fechafinal' => $_GET['fecha_termino'],
                    ));
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
            else
            {
                $this->render('bparcial');
            }
        }
}