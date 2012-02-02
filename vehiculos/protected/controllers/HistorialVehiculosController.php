<?php

class HistorialVehiculosController extends GxController {
    
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
				'actions'=>array('admin','delete', 'ACPatente'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'HistorialVehiculos'),
		));
	}

	public function actionCreate() {
		$model = new HistorialVehiculos;


		if (isset($_POST['HistorialVehiculos'])) {
			$model->setAttributes($_POST['HistorialVehiculos']);

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
		$model = $this->loadModel($id, 'HistorialVehiculos');


		if (isset($_POST['HistorialVehiculos'])) {
			$model->setAttributes($_POST['HistorialVehiculos']);

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
			$this->loadModel($id, 'HistorialVehiculos')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('HistorialVehiculos');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new HistorialVehiculos('search');
		$model->unsetAttributes();

		if (isset($_GET['HistorialVehiculos']))
			$model->setAttributes($_GET['HistorialVehiculos']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
        
        public function actionACPatente() {
            if (isset($_GET['term'])) {
            $searchTerm = $_GET['term'];
            $result = array();
            $patentes = Vehiculos::model()->findAll('patente LIKE :nombre', array(':nombre' => '%' . $searchTerm . '%'));

            foreach ($patentes as $patente) {
                $result[] = array(
                    'label' => $patente->patente, // label y value son usados por el juiautocomplete
                    'value' => $patente->patente,
                    'id' => $patente->id,
                );
            }

                echo CJSON::encode($result);
            }
        }

}