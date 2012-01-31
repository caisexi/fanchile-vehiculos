<?php

class OrdenTrabajoController extends GxController {
    
        public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','ACRf','ACVehi'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}


	public function actionView($id) {
                $dataProvider = new CActiveDataProvider('DetallesOt', array(
                    'pagination'=>array(
                        'pageSize'=>30,
                    ),
                    'criteria' => array(
                        'condition' => 'id_ot = :ot',
                        'params' => array(
                        ':ot' => $this->loadModel($id, 'OrdenTrabajo')->id,
                        ),
                        ),
                    )
                        
                );
		$this->render('view', array(
			'model' => $this->loadModel($id, 'OrdenTrabajo'),
                        'detOt' => $dataProvider,
		));
	}

	public function actionCreate() {

                Yii::import('ext.multimodelform.MultiModelForm');
                
		$model = new OrdenTrabajo;
                
                $detalle = new DetallesOt;
                
                $detallesValidados = array();

		if (isset($_POST['OrdenTrabajo'])) {
			$model->setAttributes($_POST['OrdenTrabajo']);

			if (MultiModelForm::validate($detalle,$detallesValidados,$detallesBorrados) && $model->save()) {
                            
				$masterValues = array ('id_ot'=>$model->id);
                                
                                if (MultiModelForm::save($detalle,$detallesValidados,$detallesBorrados,$masterValues))
                                {
                                        $factura = $this->loadModel($model->id_rf, 'RegistroFactura');
                                        $suma = $model->sumita;
                                        $suma_neto = $suma + $factura->total_neto;
                                        $iva = Ivas::model()->findBySql('SELECT valor_iva FROM ivas ORDER BY fecha DESC');
                                        $suma_bruto = $suma_neto * (($iva['valor_iva']/100)+1);
                                        $factura->setAttributes(array('total_neto'=>$suma_neto, 'total_bruto'=>round($suma_bruto)));
                                        if($factura->save())
                                            $this->redirect(array('registrofactura/view', 'id' => $factura->id));
                                }
			}
		}

		$this->render('create', array( 'model' => $model, 'detalle' => $detalle, 'detallesValidados' => $detallesValidados));
	}

	public function actionUpdate($id) {
                Yii::import('ext.multimodelform.MultiModelForm');
                
		$model = $this->loadModel($id, 'OrdenTrabajo');
                
                $detalle = new DetallesOt;
                
                $detallesValidados = array();

		if (isset($_POST['OrdenTrabajo'])) {
			$model->setAttributes($_POST['OrdenTrabajo']);
                        
                        $masterValues = array ('id_ot'=>$model->id);

			if (MultiModelForm::save($detalle,$detallesValidados,$detallesBorrados,$masterValues) && $model->save()) {
				$factura = $this->loadModel($model->id_rf, 'RegistroFactura');
                                        $iva = Ivas::model()->findBySql('SELECT valor_iva FROM ivas ORDER BY fecha DESC');
                                        $suma_bruto = $factura->sumarNeto() * (($iva['valor_iva']/100)+1);
                                        $factura->setAttributes(array('total_neto'=>$factura->sumarNeto(), 'total_bruto'=>round($suma_bruto)));
                                        if($factura->save())
                                            $this->redirect(array('registrofactura/view', 'id' => $factura->id));
			}
		}

		$this->render('update', array(
				'model' => $model, 'detalle' => $detalle, 'detallesValidados' => $detallesValidados,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'OrdenTrabajo')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('OrdenTrabajo');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new OrdenTrabajo('search');
		$model->unsetAttributes();

		if (isset($_GET['OrdenTrabajo']))
			$model->setAttributes($_GET['OrdenTrabajo']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
        
        public function actionACRf() {
            if (isset($_GET['term'])) {
            $searchTerm = $_GET['term'];
            $result = array();
            $getrfs = RegistroFactura::model()->findAll('nro_factura LIKE :nro_factura', array(':nro_factura' => '%' . $searchTerm . '%'));

            foreach ($getrfs as $getrf) {
                $result[] = array(
                    'label' => $getrf->nro_factura, // label y value son usados por el juiautocomplete
                    'value' => $getrf->nro_factura,
                    'id' => $getrf->id,
                );
            }

                echo CJSON::encode($result);
            }
        }
        
        public function actionACVehi() {
            if (isset($_GET['term'])) {
            $searchTerm = $_GET['term'];
            $result = array();
            $gevehis = Vehiculos::model()->findAll('patente LIKE :patente', array(':patente' => '%' . $searchTerm . '%'));

            foreach ($gevehis as $gevehi) {
                $result[] = array(
                    'label' => $gevehi->patente, // label y value son usados por el juiautocomplete
                    'value' => $gevehi->patente,
                    'id' => $gevehi->id,
                );
            }

                echo CJSON::encode($result);
            }
        }

}