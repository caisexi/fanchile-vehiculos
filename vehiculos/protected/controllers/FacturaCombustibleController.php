<?php

class FacturaCombustibleController extends GxController {
    
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
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionView($id) {
                $dataProvider = new CActiveDataProvider('DetFacturaCombustible', array(
                    'pagination'=>array(
                        'pageSize'=>30,
                    ),
                    'sort'=>array(
			'defaultOrder'=>'id_vehiculo ASC',
                    ),
                    'criteria' => array(
                        'condition' => 'id_factura_combustible = :idfc',
                        'params' => array(
                        ':idfc' => $this->loadModel($id, 'FacturaCombustible')->id,
                        ),
                        ),
                    )
                        
                );
		$this->render('view', array(
			'model' => $this->loadModel($id, 'FacturaCombustible'),
                        'DetFacturaCombustible' => $dataProvider,
		));
	}

	public function actionCreate() {
                Yii::import('ext.multimodelform.MultiModelForm');
                
		$model = new FacturaCombustible;
                
                $detalle = new DetFacturaCombustible();
                
                $detallesValidados = array();

		if (isset($_POST['FacturaCombustible'])) {
			$model->setAttributes($_POST['FacturaCombustible']);

			if (MultiModelForm::validate($detalle,$detallesValidados,$detallesBorrados) && $model->save()) {
                            
				$masterValues = array ('id_factura_combustible'=>$model->id);
                                
                                if (MultiModelForm::save($detalle,$detallesValidados,$detallesBorrados,$masterValues))
                                {
                                    $this->redirect(array('facturacombustible/view', 'id' => $model->id));
                                }                                
			}
		}

		$this->render('create', array( 'model' => $model,
                                'detalle'=> $detalle,
                                'detallesValidados' => $detallesValidados
				));
	}

	public function actionUpdate($id) {
                Yii::import('ext.multimodelform.MultiModelForm');
                
		$model = $this->loadModel($id, 'FacturaCombustible');
                
                $detalle = new DetFacturaCombustible();
                
                $detallesValidados = array();

		if (isset($_POST['FacturaCombustible'])) {
			$model->setAttributes($_POST['FacturaCombustible']);
                        $masterValues = array ('id_factura_combustible'=>$model->id);
                        
			if (MultiModelForm::save($detalle,$detallesValidados,$detallesBorrados,$masterValues) && $model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
                                'detalle'=> $detalle,
                                'detallesValidados' => $detallesValidados
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'FacturaCombustible')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('FacturaCombustible');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new FacturaCombustible('search');
		$model->unsetAttributes();

		if (isset($_GET['FacturaCombustible']))
			$model->setAttributes($_GET['FacturaCombustible']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}