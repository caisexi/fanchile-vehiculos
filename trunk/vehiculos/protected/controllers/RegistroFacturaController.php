<?php

class RegistroFacturaController extends GxController {
    
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
                $dataProvider = new CActiveDataProvider('OrdenTrabajo', array(
                    'pagination'=>array(
                        'pageSize'=>30,
                    ),
                    'sort'=>array(
			'defaultOrder'=>'fecha ASC',
                    ),
                    'criteria' => array(
                        'condition' => 'id_rf = :rf',
                        'params' => array(
                        ':rf' => $this->loadModel($id, 'RegistroFactura')->id,
                        ),
                        ),
                    )
                        
                );
            
		$this->render('view', array(
			'model' => $this->loadModel($id, 'RegistroFactura'),
                        'OrdenTrabajo' => $dataProvider,
		));
	}

	public function actionCreate() {
		$model = new RegistroFactura;


		if (isset($_POST['RegistroFactura'])) {
			$model->setAttributes($_POST['RegistroFactura']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'RegistroFactura');


		if (isset($_POST['RegistroFactura'])) {
			$model->setAttributes($_POST['RegistroFactura']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'RegistroFactura')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('RegistroFactura');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new RegistroFactura('search');
		$model->unsetAttributes();

		if (isset($_GET['RegistroFactura']))
			$model->setAttributes($_GET['RegistroFactura']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}