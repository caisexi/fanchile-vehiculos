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
        
        
        public function actionGastocombustible()
        {
            $this->layout = '//layouts/pg';
            if(isset($_GET['anio']))
            {
                $oDbConnection = Yii::app()->db;
              
                $oCommand = $oDbConnection->createCommand('select SUM(gasolina.litros) as gasolitros, MONTH(gasolina.fecha) as mes, combustibles.nombre as combu from gasolina INNER JOIN vehiculos ON vehiculos.id = gasolina.id_vehiculo INNER JOIN combustibles ON combustibles.id = vehiculos.idCombustible where gasolina.id_vehiculo = :idv AND YEAR(gasolina.fecha) = :ano GROUP BY MONTH(gasolina.fecha)');
                $oCommand->bindParam(':idv', $_GET['cv']);
                $oCommand->bindParam(':ano', $_GET['anio']);
                $oCDbDataReader = $oCommand->queryAll();

                $oCommand2 = $oDbConnection->createCommand('select SUM(diesel.litros) as diesilitros, MONTH(diesel.fecha) as mes, combustibles.nombre as combu from diesel INNER JOIN vehiculos ON vehiculos.id = diesel.id_vehiculo INNER JOIN combustibles ON combustibles.id = vehiculos.idCombustible where diesel.id_vehiculo = :idv AND YEAR(diesel.fecha) = :ano GROUP BY MONTH(diesel.fecha)');
                $oCommand2->bindParam(':idv', $_GET['cv']);
                $oCommand2->bindParam(':ano', $_GET['anio']);
                $oCDbDataReader2 = $oCommand2->queryAll();

                $oCommand3 = $oDbConnection->createCommand('select SUM(det_factura_combustible.litros) as factulitros, MONTH(factura_combustible.fecha) as mes, combustibles.nombre as combu from det_factura_combustible INNER JOIN factura_combustible on factura_combustible.id = det_factura_combustible.id_factura_combustible INNER JOIN combustibles on combustibles.id = factura_combustible.id_combustible where det_factura_combustible.id_vehiculo = :idv AND YEAR(factura_combustible.fecha) = :ano GROUP BY MONTH(factura_combustible.fecha)');
                $oCommand3->bindParam(':idv', $_GET['cv']);
                $oCommand3->bindParam(':ano', $_GET['anio']);
                $oCDbDataReader3 = $oCommand3->queryAll();
                
                $oCommand4 = $oDbConnection->createCommand('select SUM(bitacoras.litros_adicionales) AS litrosad, MONTH(bitacoras.fecha) AS mes from bitacoras where bitacoras.id_vehiculo = :idv AND YEAR(bitacoras.fecha) = :ano GROUP BY MONTH(bitacoras.fecha)');
                $oCommand4->bindParam(':idv', $_GET['cv']);
                $oCommand4->bindParam(':ano', $_GET['anio']);
                $oCDbDataReader4 = $oCommand4->queryAll();

                $dataProvider=new CArrayDataProvider($oCDbDataReader, array(
                    'keyField'=>'mes'
                ));
                $dataProvider2=new CArrayDataProvider($oCDbDataReader2, array(
                    'keyField'=>'mes'
                ));
                $dataProvider3=new CArrayDataProvider($oCDbDataReader3, array(
                    'keyField'=>'mes'
                ));
                $dataProvider4=new CArrayDataProvider($oCDbDataReader4, array(
                    'keyField'=>'mes'
                ));
                $this->render('gc', array(
                    'dataProvider' => $dataProvider,
                    'dataProvider2' => $dataProvider2,
                    'dataProvider3' => $dataProvider3,
                    'dataProvider4' => $dataProvider4,
                    'anio'=>$_GET['anio'],
                ));
            }
            else
            {
                $this->render('gc');
            }
        }
        
        public function actionLitrosanuales()
        {
            $this->layout = '//layouts/pg';
            if(isset($_GET['anio']))
            {
                $oDbConnection = Yii::app()->db;
              
                $oCommand = $oDbConnection->createCommand('select SUM(gasolina.litros) as gasolitros, MONTH(gasolina.fecha) as mes from gasolina where YEAR(gasolina.fecha) = :ano GROUP BY MONTH(gasolina.fecha)');
                $oCommand->bindParam(':ano', $_GET['anio']);
                $oCDbDataReader = $oCommand->queryAll();

                $oCommand2 = $oDbConnection->createCommand('select SUM(diesel.litros) as diesilitros, MONTH(diesel.fecha) as mes from diesel where YEAR(diesel.fecha) = :ano GROUP BY MONTH(diesel.fecha)');
                $oCommand2->bindParam(':ano', $_GET['anio']);
                $oCDbDataReader2 = $oCommand2->queryAll();         
                
                $oCommand3 = $oDbConnection->createCommand('select SUM(factura_combustible.litros) as factulitros, MONTH(factura_combustible.fecha) as mes from factura_combustible where YEAR(factura_combustible.fecha) = :ano AND (factura_combustible.id_combustible = "2" OR factura_combustible.id_combustible = "3" OR factura_combustible.id_combustible = "4")GROUP BY MONTH(factura_combustible.fecha)');
                $oCommand3->bindParam(':ano', $_GET['anio']);
                $oCDbDataReader3 = $oCommand3->queryAll();
                
                $oCommand4 = $oDbConnection->createCommand('select SUM(factura_combustible.litros) as factulitros, MONTH(factura_combustible.fecha) as mes from factura_combustible where YEAR(factura_combustible.fecha) = :ano AND factura_combustible.id_combustible = "1" GROUP BY MONTH(factura_combustible.fecha)');
                $oCommand4->bindParam(':ano', $_GET['anio']);
                $oCDbDataReader4 = $oCommand4->queryAll();

                $dataProvider=new CArrayDataProvider($oCDbDataReader, array(
                    'keyField'=>'mes'
                ));
                $dataProvider2=new CArrayDataProvider($oCDbDataReader2, array(
                    'keyField'=>'mes'
                ));                
                $dataProvider3=new CArrayDataProvider($oCDbDataReader3, array(
                    'keyField'=>'mes'
                ));
                $dataProvider4=new CArrayDataProvider($oCDbDataReader4, array(
                    'keyField'=>'mes'
                ));

                $this->render('la', array(
                    'dataProvider' => $dataProvider,
                    'dataProvider2' => $dataProvider2,                    
                    'dataProvider3' => $dataProvider3,
                    'dataProvider4' => $dataProvider4,
                    'anio'=>$_GET['anio'],
                ));
            }
            else
            {
                $this->render('la');
            }
        }
        
        public function actionBmensual()
	{
            $this->layout = '//layouts/pg';
            if(isset ($_GET['mes']))
            {                
                $oDbConnection = Yii::app()->db;

                $oCommand = $oDbConnection->createCommand('SELECT vehiculos.patente, tipos_vehiculos.nombre as nombretipovehiculo, combustibles.nombre as combu , personal.nombre as nombrepersonal, personal.apellido_pat, areas_empresa.nombre as nombreareaempresa, repara.sumaSub as reparaciones , acu.sumaSub as gastoAcumulado, dfacturas.li as litrosfactura , sdiesel.litrosd as litrosdiesel, gas.litrosg as litrosgaso, bita.ladi as litrosbitacora, bita.kinicial as ini, bita.kfinal as fina, (bita.kfinal - bita.kinicial) as recorrido, (IFNULL(dfacturas.li,0) + IFNULL(SUM(sdiesel.litrosd),0) + IFNULL(gas.litrosg,0) + IFNULL(bita.ladi,0)) as totallitros, ((bita.kfinal - bita.kinicial) / (IFNULL(dfacturas.li,0) + IFNULL(SUM(sdiesel.litrosd),0) + IFNULL(gas.litrosg,0) + IFNULL(bita.ladi,0))) as kmlitros, (acu.sumaSub / bita.kfinal) as pesoskm, (IFNULL(dfacturas.ce,0) + IFNULL(sdiesel.costodiesel,0) + IFNULL(gas.costogasolina,0) + IFNULL(bita.costobita,0)) as costoempresa from (select DISTINCT historial_vehiculos.id_vehiculo, historial_vehiculos.id_persona from historial_vehiculos where historial_vehiculos.fecha <= :anomes GROUP BY historial_vehiculos.id_vehiculo ORDER BY historial_vehiculos.fecha DESC) as histo INNER JOIN vehiculos on vehiculos.id = histo.id_vehiculo and vehiculos.estado = :estado INNER JOIN tipos_vehiculos on vehiculos.idTipoVehiculo = tipos_vehiculos.id INNER JOIN combustibles on combustibles.id = vehiculos.idCombustible INNER JOIN personal on personal.id = histo.id_persona INNER JOIN cargos_empresa on personal.id_cargo_empresa = cargos_empresa.id INNER JOIN areas_empresa on areas_empresa.id = cargos_empresa.id_area_empresa LEFT JOIN (SELECT SUM(detalles_ot.subtotal) as sumaSub, orden_trabajo.id_vehiculo as vehiOrden FROM detalles_ot INNER JOIN orden_trabajo on orden_trabajo.id = detalles_ot.id_ot INNER JOIN registro_factura ON registro_factura.id = orden_trabajo.id_rf WHERE YEAR(registro_factura.fecha) = :ano AND MONTH(registro_factura.fecha) = :mes GROUP BY orden_trabajo.id_vehiculo) as repara on repara.vehiOrden = vehiculos.id  LEFT JOIN (SELECT SUM(detalles_ot.subtotal) as sumaSub, orden_trabajo.id_vehiculo as vehiOrden FROM detalles_ot INNER JOIN orden_trabajo on orden_trabajo.id = detalles_ot.id_ot INNER JOIN registro_factura ON registro_factura.id = orden_trabajo.id_rf WHERE date_format(registro_factura.fecha,"%Y-%m") <= :anomes GROUP BY orden_trabajo.id_vehiculo) as acu on acu.vehiOrden = vehiculos.id LEFT JOIN (SELECT det_factura_combustible.id_vehiculo as v, SUM(det_factura_combustible.litros) as li, SUM(factura_combustible.valor_guia) as ce from factura_combustible INNER JOIN det_factura_combustible on det_factura_combustible.id_factura_combustible = factura_combustible.id WHERE YEAR(factura_combustible.fecha) = :ano AND MONTH(factura_combustible.fecha) = :mes GROUP BY det_factura_combustible.id_vehiculo) as dfacturas ON dfacturas.v = vehiculos.id LEFT JOIN (SELECT SUM(diesel.litros) as litrosd, diesel.id_vehiculo, SUM(diesel.costo_empresa) as costodiesel FROM diesel WHERE YEAR(diesel.fecha) = :ano AND MONTH(diesel.fecha) = :mes GROUP BY diesel.id_vehiculo) as sdiesel ON sdiesel.id_vehiculo = vehiculos.id LEFT JOIN (select SUM(gasolina.litros) as litrosg, SUM(gasolina.costo_empresa) as costogasolina, gasolina.id_vehiculo FROM gasolina WHERE YEAR(gasolina.fecha) = :ano AND MONTH(gasolina.fecha) = :mes GROUP BY gasolina.id_vehiculo)as gas ON gas.id_vehiculo = vehiculos.id LEFT JOIN (SELECT SUM(bitacoras.litros_adicionales) AS ladi, MIN(bitacoras.kilometraje_inicial) AS kinicial, MAX(bitacoras.kilometraje_final) as kfinal, bitacoras.id_vehiculo, SUM(bitacoras.costo_empresa) as costobita FROM bitacoras WHERE YEAR(bitacoras.fecha) = :ano AND MONTH(bitacoras.fecha) = :mes GROUP BY bitacoras.id_vehiculo) as bita ON bita.id_vehiculo = vehiculos.id GROUP BY vehiculos.patente ORDER BY recorrido DESC, vehiculos.patente');

                $oCommand2 = $oDbConnection->createCommand('SELECT SUM(detalles_ot.subtotal) AS total FROM registro_factura INNER JOIN orden_trabajo ON orden_trabajo.id_rf = registro_factura.id INNER JOIN detalles_ot ON detalles_ot.id_ot = orden_trabajo.id WHERE YEAR(registro_factura.fecha) = :ano AND MONTH(registro_factura.fecha) = :mes');
                
                $oCommand3 = $oDbConnection->createCommand('SELECT ano, ppto_anual, ppto_mensual FROM presupuesto WHERE ano = :ano');
                
                $oCommand4 = $oDbConnection->createCommand('SELECT SUM(detalles_ot.subtotal) AS total FROM registro_factura INNER JOIN orden_trabajo ON orden_trabajo.id_rf = registro_factura.id INNER JOIN detalles_ot ON detalles_ot.id_ot = orden_trabajo.id WHERE date_format(registro_factura.fecha,"%Y-%m") <= :anomes');
                
                $oCommand->bindParam(':estado', $estado = 1);

                $oCommand->bindParam(':mes', $_GET['mes']);
                
                $oCommand->bindParam(':ano', $_GET['ano']);
                
                $oCommand->bindParam(':anomes', $anomes = $_GET['ano'].'-'.$_GET['mes']);
                
                $oCommand2->bindParam(':mes', $_GET['mes']);
                
                $oCommand2->bindParam(':ano', $_GET['ano']);
                
                $oCommand3->bindParam(':ano', $_GET['ano']);
                
                $oCommand4->bindParam(':anomes', $anomes = $_GET['ano'].'-'.$_GET['mes']);

                $oCDbDataReader = $oCommand->queryAll();
                
                $oCDbDataReader2 = $oCommand2->queryAll();
                
                $oCDbDataReader3 = $oCommand3->queryAll();
                
                $oCDbDataReader4 = $oCommand4->queryAll();

                $dataProvider=new CArrayDataProvider($oCDbDataReader, array(
                    'keyField'=>'patente',
                    'pagination'=>array(
                        'pageSize'=>60,
                    ),
                ));
                
                $dataProvider2=new CArrayDataProvider($oCDbDataReader2, array(
                    'keyField'=>'total',
                ));
                
                $dataProvider3=new CArrayDataProvider($oCDbDataReader3, array(
                    'keyField'=>'ano',
                ));
                
                $dataProvider4=new CArrayDataProvider($oCDbDataReader4, array(
                    'keyField'=>'total',
                ));
                
                if(!isset($_GET['pdf']))
                {          
                    $this->render('bmensual', array(
                        'dataProvider' => $dataProvider,
                        'dataProvider2' => $dataProvider2,
                        'dataProvider3' => $dataProvider3,
                        'dataProvider4' => $dataProvider4,
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

                    $mPDF1->SetFooter('REPORTE MENSUAL {DATE j-m-Y}');

                    $mPDF1->AddPage('L','','','','','','','','','','','','','','','','','','','','A3-L');



                    $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/styles_pdf.css');
                    $mPDF1->WriteHTML($stylesheet, 1);

                    $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/screen_pdf.css');
                    $mPDF1->WriteHTML($stylesheet, 1);

                    $mPDF1->WriteHTML($this->renderPartial('mensualpdf', array('dataProvider' => $dataProvider,'dataProvider2' => $dataProvider2,'dataProvider3' => $dataProvider3,'dataProvider4' => $dataProvider4,
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

                $oCommand = $oDbConnection->createCommand('SELECT vehiculos.patente, tipos_vehiculos.nombre as nombretipovehiculo, personal.nombre as nombrepersonal, personal.apellido_pat, areas_empresa.nombre as nombreareaempresa, repara.sumaSub as reparaciones , acu.sumaSub as gastoAcumulado, bita.kinicial as ini, bita.kfinal as final, (bita.kfinal - bita.kinicial) as recorrido,((acu.sumaSub)/(bita.kfinal)) as pesoskm from (select DISTINCT historial_vehiculos.id_vehiculo, historial_vehiculos.id_persona from historial_vehiculos where historial_vehiculos.fecha <= :fechatermn GROUP BY historial_vehiculos.id_vehiculo ORDER BY historial_vehiculos.fecha DESC) as histo INNER JOIN vehiculos on vehiculos.id = histo.id_vehiculo and vehiculos.estado = :estado INNER JOIN tipos_vehiculos on vehiculos.idTipoVehiculo = tipos_vehiculos.id INNER JOIN personal on personal.id = histo.id_persona INNER JOIN cargos_empresa on personal.id_cargo_empresa = cargos_empresa.id INNER JOIN areas_empresa on areas_empresa.id = cargos_empresa.id_area_empresa LEFT JOIN (SELECT SUM(detalles_ot.subtotal) as sumaSub, orden_trabajo.id_vehiculo as vehiOrden FROM detalles_ot INNER JOIN orden_trabajo on orden_trabajo.id = detalles_ot.id_ot INNER JOIN registro_factura ON registro_factura.id = orden_trabajo.id_rf WHERE registro_factura.fecha > :fechainic AND registro_factura.fecha <= :fechatermn) as repara on repara.vehiOrden = vehiculos.id LEFT JOIN (SELECT SUM(detalles_ot.subtotal) as sumaSub, orden_trabajo.id_vehiculo as vehiOrden FROM detalles_ot INNER JOIN orden_trabajo on orden_trabajo.id = detalles_ot.id_ot INNER JOIN registro_factura ON registro_factura.id = orden_trabajo.id_rf WHERE registro_factura.fecha <= :fechatermn) as acu on acu.vehiOrden = vehiculos.id LEFT JOIN (SELECT SUM(bitacoras.litros_adicionales) AS ladi, MIN(bitacoras.kilometraje_inicial) AS kinicial, MAX(bitacoras.kilometraje_final) as kfinal, bitacoras.id_vehiculo FROM bitacoras WHERE bitacoras.fecha > :fechainic AND bitacoras.fecha <= :fechatermn) as bita ON bita.id_vehiculo = vehiculos.id GROUP BY histo.id_vehiculo ORDER BY vehiculos.patente');

                $oCommand->bindParam(':estado', $estado = 1);

                $oCommand->bindParam(':fechainic', $_GET['fecha_inicial']);

                $oCommand->bindParam(':fechatermn', $_GET['fecha_termino']);

                $oCDbDataReader = $oCommand->queryAll();

                $dataProvider=new CArrayDataProvider($oCDbDataReader, array(
                    'keyField'=>'patente',
                    'pagination'=>array(
                        'pageSize'=>60,
                    ),
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

                    $mPDF1->SetFooter('REPORTE PARCIAL {DATE j-m-Y}');
                    $mPDF1->AddPage('L','','','','','','','','','','','','','','','','','','','','A3-L');



                    $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/styles_pdf.css');
                    $mPDF1->WriteHTML($stylesheet, 1);

                    $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/screen_pdf.css');
                    $mPDF1->WriteHTML($stylesheet, 1);

                    $mPDF1->WriteHTML($this->renderPartial('parcialpdf', array('dataProvider' => $dataProvider,
                        ), true));

                    $mPDF1->Output();
                }
            }
            else
            {
                $this->render('bparcial');
            }
        }
        
        public function actionSubir() {
            
            if(isset($_FILES['excel']) && !empty($_FILES['excel']['name']))
            {                
                extract($_POST);

                if (isset($action) && $action == "upload"){

                    $archivo = $_FILES['excel']['name'];

                    $destino = "xls/bak_".$archivo;
                    
                    $p = PlanillasCopec::model()->find('nombre = :archivo', array(':archivo' => $archivo));
                    
                    if($p != null && !isset ($sobreescribir))
                    {                        
                        Yii::app()->user->setFlash('notice', "El Archivo ".$archivo." ya existe!");
                        $this->render('subir');
                    }                    
                    else
                    {
                        if (copy($_FILES['excel']['tmp_name'],$destino)) 
                        {
                            Yii::import('application.extensions.Classes.PHPExcel',true);
                            $objReader = new PHPExcel_Reader_Excel5;
                            $objPHPExcel = $objReader->load("xls/bak_".$archivo);
                            $objPHPExcel->setActiveSheetIndex(0);
                            $valid=true;
                            $i='2'; 
                            $gas = false;
                            $petroleo = false;
                            if (preg_match("/g93/i",$objPHPExcel->getActiveSheet()->getCell("F2")->getValue()))
                                        $gas = true;
                                else
                                    if (preg_match("/g95/i",$objPHPExcel->getActiveSheet()->getCell("F2")->getValue()))
                                        $gas = true;
                                    else
                                        if (preg_match("/g95/i",$objPHPExcel->getActiveSheet()->getCell("F2")->getValue()))
                                            $gas = true;
                                        else
                                            if (preg_match("/diesel/i",$objPHPExcel->getActiveSheet()->getCell("H2")->getValue()))
                                                $petroleo = true;
                            if($p != null)
                            {
                                $planilla = $this->loadModel($p->id, 'PlanillasCopec');
                                $planilla->delete();
                                $planilla = new PlanillasCopec();
                                $planilla->nombre = $archivo;                                
                            }
                            else
                            {
                                $planilla = new PlanillasCopec();
                                $planilla->nombre = $archivo;
                            }
                            
                            if($gas)
                                    $planilla->tipo_planilla = '1';
                                else
                                    $planilla->tipo_planilla = '0';
                                
                            if($gas || $petroleo)
                            {
                                if($planilla->save())
                                {
                                    Yii::app()->user->setFlash('success', $archivo . " Subido con Exito!");
                                    if($petroleo)
                                    {
                                        while($objPHPExcel->getActiveSheet()->getCell("F".$i)->getValue() != ''){
                                            $diesel[$i] = new Diesel();
                                            $vehiculo = Vehiculos::model()->find('patente like :pate',array('pate' => substr(str_replace(array('-',' '), '',  trim($objPHPExcel->getActiveSheet()->getCell('D'.($i))->getCalculatedValue())),0,6).'%'));
                                            $diesel[$i]->setAttributes(array(
                                                'id_planilla' => $planilla->id,
                                                'nro_factura' => $objPHPExcel->getActiveSheet()->getCell('B'.($i))->getCalculatedValue(),
                                                'id_vehiculo' => isset($vehiculo->id) ? $vehiculo->id : '',
                                                'fecha' => date("Y-m-d",PHPExcel_Shared_Date::ExcelToPHP($objPHPExcel->getActiveSheet()->getCell('E'.($i))->getCalculatedValue())),
                                                'region' => $objPHPExcel->getActiveSheet()->getCell('F'.($i))->getCalculatedValue(),
                                                'estacion' => $objPHPExcel->getActiveSheet()->getCell('G'.($i))->getCalculatedValue(),
                                                'litros' => str_replace(',', '.', $objPHPExcel->getActiveSheet()->getCell('I'.($i))->getCalculatedValue()),
                                                'precio_u' => intval($objPHPExcel->getActiveSheet()->getCell('J'.($i))->getCalculatedValue()),
                                                'especifico' => intval($objPHPExcel->getActiveSheet()->getCell('K'.($i))->getCalculatedValue()),
                                                'variable' => intval($objPHPExcel->getActiveSheet()->getCell('L'.($i))->getCalculatedValue()),
                                                'total' => str_replace(array(',','.'), '', $objPHPExcel->getActiveSheet()->getCell('M'.($i))->getCalculatedValue()),
                                                'costo_empresa' => intval(((str_replace(array(',','.'), '', $objPHPExcel->getActiveSheet()->getCell('M'.($i))->getCalculatedValue()) - intval($objPHPExcel->getActiveSheet()->getCell('K'.($i))->getCalculatedValue()))/1.19)+intval($objPHPExcel->getActiveSheet()->getCell('K'.($i))->getCalculatedValue())),
                                                'nro_guia' => $objPHPExcel->getActiveSheet()->getCell('N'.($i))->getCalculatedValue(),
                                                'rollo' => $objPHPExcel->getActiveSheet()->getCell('O'.($i))->getCalculatedValue(),
                                            ));
                                            $valid = $diesel[$i]->validate() && $valid;
                                            if($valid == false)
                                                $invalido[$i] = $i;
                                            $i++;
                                        }
                                        if($valid)
                                        {
                                            foreach($diesel as $di)
                                            {
                                                $di->save();
                                            }
                                            $this->redirect(array('planillascopec/view', 'id' => $planilla->id));
                                        }
                                        else{
                                            Yii::app()->user->setFlash('error', "No se han podido validar los datos!");
                                            $this->render('subir',array('invalido'=>$invalido,'diesel'=>$diesel));
                                        }
                                    }
                                    elseif($gas)
                                    {
                                        while($objPHPExcel->getActiveSheet()->getCell("F".$i)->getValue() != ''){
                                            $gasolina[$i] = new Gasolina();
                                            $vehiculo = Vehiculos::model()->find('patente like :pate',array('pate' => substr(str_replace(array('-',' '), '',  trim($objPHPExcel->getActiveSheet()->getCell('D'.($i))->getCalculatedValue())),0,6).'%'));
                                            $gasolina[$i]->setAttributes(array(
                                                'id_planilla' => $planilla->id,
                                                'nro_factura' => $objPHPExcel->getActiveSheet()->getCell('B'.($i))->getCalculatedValue(),
                                                'id_vehiculo' => isset($vehiculo->id) ? $vehiculo->id : '',
                                                'tarjeta' => $objPHPExcel->getActiveSheet()->getCell('E'.($i))->getCalculatedValue(),
                                                'fecha' => date("Y-m-d",PHPExcel_Shared_Date::ExcelToPHP($objPHPExcel->getActiveSheet()->getCell('G'.($i))->getCalculatedValue())),
                                                'hora' => date("H:i:s",PHPExcel_Shared_Date::ExcelToPHP($objPHPExcel->getActiveSheet()->getCell('H'.($i))->getCalculatedValue())),
                                                'comuna' => $objPHPExcel->getActiveSheet()->getCell('I'.($i))->getCalculatedValue(),
                                                'direccion' => $objPHPExcel->getActiveSheet()->getCell('J'.($i))->getCalculatedValue(),
                                                'nro_transaccion' => $objPHPExcel->getActiveSheet()->getCell('K'.($i))->getCalculatedValue(),
                                                'precio_u' => intval($objPHPExcel->getActiveSheet()->getCell('M'.($i))->getCalculatedValue()),
                                                'litros' => str_replace(',', '.', $objPHPExcel->getActiveSheet()->getCell('N'.($i))->getCalculatedValue()),
                                                'especifico' => intval($especifico * str_replace(',', '.', $objPHPExcel->getActiveSheet()->getCell('N'.($i))->getCalculatedValue())),
                                                'total' => str_replace(array(',','.'), '', $objPHPExcel->getActiveSheet()->getCell('O'.($i))->getCalculatedValue()),
                                                'costo_empresa' => intval(((str_replace(array(',','.'), '', $objPHPExcel->getActiveSheet()->getCell('O'.($i))->getCalculatedValue()) - ($especifico * str_replace(',', '.', $objPHPExcel->getActiveSheet()->getCell('N'.($i))->getCalculatedValue())))/1.19) + ($especifico * str_replace(',', '.', $objPHPExcel->getActiveSheet()->getCell('N'.($i))->getCalculatedValue()))),
                                            ));
                                            $valid = $gasolina[$i]->validate() && $valid;
                                            if($valid == false)
                                                $invalido[$i] = $i;
                                            $i++;
                                        }
                                        if($valid)
                                        {
                                            foreach($gasolina as $ga)
                                            {
                                                $ga->save();
                                            }
                                            $this->redirect(array('planillascopec/view', 'id' => $planilla->id));
                                        }
                                        else{
                                            Yii::app()->user->setFlash('error', "No se han podido validar los datos!");
                                            $this->render('subir',array('invalido'=>$invalido,'gasolina'=>$gasolina));
                                        }
                                    }
                                }
                                else{
                                    unlink("xls/bak_".$archivo);
                                    Yii::app()->user->setFlash('error', "No se han podido validar los datos!");
                                    $this->render('subir',array('invalido'=>$invalido,'gasolina'=>$gasolina));
                                }
                            }
                            else
                            {
                                unlink("xls/bak_".$archivo);
                                Yii::app()->user->setFlash('error', "Planilla no valida!");
                                $this->render('subir',array('planilla'=>$planilla));
                            }
                        }
                        else
                        {
                            Yii::app()->user->setFlash('error', "Error al cargar archivo!");
                        }
                    }                   
                }
                else{
                    Yii::app()->user->setFlash('error', "Necesitas importar el archivo!");
                }
            }
            else
            {
                if(isset($_FILES['excel']) && empty($_FILES['excel']['name']))
                    Yii::app()->user->setFlash('notice', "No ha seleccionado archivo o esta vacio.");
                $this->render('subir');
            }
	}
        
        public function actionInforme()
	{
            $this->layout = '//layouts/pg';
            if(isset ($_GET['mes']))
            {                
                $oDbConnection = Yii::app()->db;

                $oCommand = $oDbConnection->createCommand('SELECT areas_empresa.nombre as area, personal.nombre, personal.apellido_pat, vehiculos.patente, (IFNULL(dfacturas.li,0) + IFNULL(SUM(sdiesel.litrosd),0) + IFNULL(gas.litrosg,0) + IFNULL(bita.ladi,0)) as totallitros, ((IFNULL(dfacturas.ce,0) + IFNULL(sdiesel.costodiesel,0) + IFNULL(gas.costogasolina,0) + IFNULL(bita.costobita,0)) - (IFNULL(dfacturas.costoespecifico,0) + IFNULL(sdiesel.costoespecifico,0) + IFNULL(gas.costoespecifico,0) + IFNULL(bita.costoespecifico,0))) as neto,(((IFNULL(dfacturas.ce,0) + IFNULL(sdiesel.costodiesel,0) + IFNULL(gas.costogasolina,0) + IFNULL(bita.costobita,0)) - (IFNULL(dfacturas.costoespecifico,0) + IFNULL(sdiesel.costoespecifico,0) + IFNULL(gas.costoespecifico,0) + IFNULL(bita.costoespecifico,0))) *0.19) as iva, (IFNULL(dfacturas.costoespecifico,0) + IFNULL(sdiesel.costoespecifico,0) + IFNULL(gas.costoespecifico,0) + IFNULL(bita.costoespecifico,0)) as costoespecifico, (IFNULL(dfacturas.ce,0) + IFNULL(sdiesel.costodiesel,0) + IFNULL(gas.costogasolina,0) + IFNULL(bita.costobita,0)) as costoempresa FROM (select DISTINCT historial_vehiculos.id_vehiculo, historial_vehiculos.id_persona from historial_vehiculos where historial_vehiculos.fecha <= :anomes GROUP BY historial_vehiculos.id_vehiculo ORDER BY historial_vehiculos.fecha DESC) as histo INNER JOIN vehiculos on vehiculos.id = histo.id_vehiculo and vehiculos.estado = :estado INNER JOIN combustibles on combustibles.id = vehiculos.idCombustible INNER JOIN personal on personal.id = histo.id_persona INNER JOIN cargos_empresa on personal.id_cargo_empresa = cargos_empresa.id INNER JOIN areas_empresa on areas_empresa.id = cargos_empresa.id_area_empresa LEFT JOIN (SELECT det_factura_combustible.id_vehiculo as v, SUM(det_factura_combustible.litros) as li, SUM(factura_combustible.valor_guia) as ce, SUM(factura_combustible.especifico) as costoespecifico from factura_combustible INNER JOIN det_factura_combustible on det_factura_combustible.id_factura_combustible = factura_combustible.id WHERE YEAR(factura_combustible.fecha) = :ano AND MONTH(factura_combustible.fecha) = :mes GROUP BY det_factura_combustible.id_vehiculo) as dfacturas ON dfacturas.v = vehiculos.id LEFT JOIN (SELECT SUM(diesel.litros) as litrosd, diesel.id_vehiculo, SUM(diesel.costo_empresa) as costodiesel, SUM(diesel.especifico) as costoespecifico FROM diesel WHERE YEAR(diesel.fecha) = :ano AND MONTH(diesel.fecha) = :mes GROUP BY diesel.id_vehiculo) as sdiesel ON sdiesel.id_vehiculo = vehiculos.id LEFT JOIN (select SUM(gasolina.litros) as litrosg, SUM(gasolina.costo_empresa) as costogasolina, SUM(gasolina.especifico) as costoespecifico, gasolina.id_vehiculo FROM gasolina WHERE YEAR(gasolina.fecha) = :ano AND MONTH(gasolina.fecha) = :mes GROUP BY gasolina.id_vehiculo)as gas ON gas.id_vehiculo = vehiculos.id LEFT JOIN (SELECT SUM(bitacoras.litros_adicionales) AS ladi, bitacoras.id_vehiculo, SUM(bitacoras.costo_empresa) as costobita, SUM(bitacoras.especifico) as costoespecifico FROM bitacoras WHERE YEAR(bitacoras.fecha) = :ano AND MONTH(bitacoras.fecha) = :mes) as bita ON bita.id_vehiculo = vehiculos.id GROUP BY vehiculos.id ORDER BY areas_empresa.nombre, personal.nombre ASC');
                
                $oCommand2 = $oDbConnection->createCommand('SELECT areas_empresa.nombre as area, SUM(IFNULL(dfacturas.li,0) + IFNULL(sdiesel.litrosd,0) + IFNULL(gas.litrosg,0) + IFNULL(bita.ladi,0)) as totallitros, SUM((IFNULL(dfacturas.ce,0) + IFNULL(sdiesel.costodiesel,0) + IFNULL(gas.costogasolina,0) + IFNULL(bita.costobita,0)) - (IFNULL(dfacturas.costoespecifico,0) + IFNULL(sdiesel.costoespecifico,0) + IFNULL(gas.costoespecifico,0) + IFNULL(bita.costoespecifico,0))) as neto,SUM(((IFNULL(dfacturas.ce,0) + IFNULL(sdiesel.costodiesel,0) + IFNULL(gas.costogasolina,0) + IFNULL(bita.costobita,0)) - (IFNULL(dfacturas.costoespecifico,0) + IFNULL(sdiesel.costoespecifico,0) + IFNULL(gas.costoespecifico,0) + IFNULL(bita.costoespecifico,0))) *0.19) as iva, SUM(IFNULL(dfacturas.costoespecifico,0) + IFNULL(sdiesel.costoespecifico,0) + IFNULL(gas.costoespecifico,0) + IFNULL(bita.costoespecifico,0)) as costoespecifico, SUM(IFNULL(dfacturas.ce,0) + IFNULL(sdiesel.costodiesel,0) + IFNULL(gas.costogasolina,0) + IFNULL(bita.costobita,0)) as costoempresa FROM (select DISTINCT historial_vehiculos.id_vehiculo, historial_vehiculos.id_persona from historial_vehiculos where historial_vehiculos.fecha <= :anomes GROUP BY historial_vehiculos.id_vehiculo ORDER BY historial_vehiculos.fecha DESC) as histo INNER JOIN vehiculos on vehiculos.id = histo.id_vehiculo and vehiculos.estado = :estado INNER JOIN combustibles on combustibles.id = vehiculos.idCombustible INNER JOIN personal on personal.id = histo.id_persona INNER JOIN cargos_empresa on personal.id_cargo_empresa = cargos_empresa.id INNER JOIN areas_empresa on areas_empresa.id = cargos_empresa.id_area_empresa LEFT JOIN (SELECT det_factura_combustible.id_vehiculo as v, SUM(det_factura_combustible.litros) as li, SUM(factura_combustible.valor_guia) as ce, SUM(factura_combustible.especifico) as costoespecifico from factura_combustible INNER JOIN det_factura_combustible on det_factura_combustible.id_factura_combustible = factura_combustible.id WHERE YEAR(factura_combustible.fecha) = :ano AND MONTH(factura_combustible.fecha) = :mes GROUP BY det_factura_combustible.id_vehiculo) as dfacturas ON dfacturas.v = vehiculos.id LEFT JOIN (SELECT SUM(diesel.litros) as litrosd, diesel.id_vehiculo, SUM(diesel.costo_empresa) as costodiesel, SUM(diesel.especifico) as costoespecifico FROM diesel WHERE YEAR(diesel.fecha) = :ano AND MONTH(diesel.fecha) = :mes GROUP BY diesel.id_vehiculo) as sdiesel ON sdiesel.id_vehiculo = vehiculos.id LEFT JOIN (select SUM(gasolina.litros) as litrosg, SUM(gasolina.costo_empresa) as costogasolina, SUM(gasolina.especifico) as costoespecifico, gasolina.id_vehiculo FROM gasolina WHERE YEAR(gasolina.fecha) = :ano AND MONTH(gasolina.fecha) = :mes GROUP BY gasolina.id_vehiculo)as gas ON gas.id_vehiculo = vehiculos.id LEFT JOIN (SELECT SUM(bitacoras.litros_adicionales) AS ladi, bitacoras.id_vehiculo, SUM(bitacoras.costo_empresa) as costobita, SUM(bitacoras.especifico) as costoespecifico FROM bitacoras WHERE YEAR(bitacoras.fecha) = :ano AND MONTH(bitacoras.fecha) = :mes) as bita ON bita.id_vehiculo = vehiculos.id GROUP BY areas_empresa.nombre ORDER BY areas_empresa.nombre ASC');
                
                $oCommand->bindParam(':estado', $estado = 1);

                $oCommand->bindParam(':mes', $_GET['mes']);
                
                $oCommand->bindParam(':ano', $_GET['ano']);
                
                $oCommand->bindParam(':anomes', $anomes = $_GET['ano'].'-'.$_GET['mes']);
                
                $oCommand2->bindParam(':estado', $estado = 1);

                $oCommand2->bindParam(':mes', $_GET['mes']);
                
                $oCommand2->bindParam(':ano', $_GET['ano']);
                
                $oCommand2->bindParam(':anomes', $anomes = $_GET['ano'].'-'.$_GET['mes']);

                $oCDbDataReader = $oCommand->queryAll();
                
                $oCDbDataReader2 = $oCommand2->queryAll();

                $dataProvider=new CArrayDataProvider($oCDbDataReader, array(
                    'keyField'=>'area',
                    'pagination'=>array(
                        'pageSize'=>80,
                    ),
                ));
                
                $dataProvider2=new CArrayDataProvider($oCDbDataReader2, array(
                    'keyField'=>'area',
                    'pagination'=>array(
                        'pageSize'=>20,
                    ),
                ));
                
                if(!isset($_GET['pdf']))
                {          
                    $this->render('informe', array(
                        'dataProvider' => $dataProvider,
                        'dataProvider2' => $dataProvider2,
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
                          'content' => 'INFORME MENSUAL DE COMBUSTIBLES DE '.strtoupper($mes_letra).' DEL '.strtoupper($_GET['ano']),
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

                    $mPDF1->SetFooter('INFORME MENSUAL {DATE j-m-Y}');

                    $mPDF1->AddPage('L','','','','','','','','','','','','','','','','','','','','A3-L');



                    $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/styles_pdf.css');
                    $mPDF1->WriteHTML($stylesheet, 1);

                    $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/screen_pdf.css');
                    $mPDF1->WriteHTML($stylesheet, 1);

                    $mPDF1->WriteHTML($this->renderPartial('informepdf', array('dataProvider' => $dataProvider,'dataProvider2' => $dataProvider2,
                        'mes' => $_GET['mes'],
                        'ano' => $_GET['ano'],
                        ), true));

                    $mPDF1->Output();
                }
            }
            else
            {
                $this->render('informe');
            }
        }
}