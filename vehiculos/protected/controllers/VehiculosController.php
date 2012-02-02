<?php

class VehiculosController extends GxController {
    
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
				'actions'=>array('admin','delete','ACColor','ACModelo','ACMarca','ACCombustibles','ACTiposVehiculos','ACProveedor'),
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
                        'pageSize'=>10,
                    ),
                    'sort'=>array(
			'defaultOrder'=>'idRf.fecha ASC',
                    ),
                    'criteria' => array(
                        'with' => array('idRf'),
                        'condition' => 'id_vehiculo = :idvh',
                        'params' => array(
                            ':idvh' => $this->loadModel($id, 'Vehiculos')->id,
                        ),
                    ),
                ));
               
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Vehiculos'),
                        'dataProvider' => $dataProvider,
		));
	}

	public function actionCreate() {
		$model = new Vehiculos;
                
                //$this->performAjaxValidation($model);

		if (isset($_POST['Vehiculos'])) {
			$model->setAttributes($_POST['Vehiculos']);

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
		$model = $this->loadModel($id, 'Vehiculos');


		if (isset($_POST['Vehiculos'])) {
			$model->setAttributes($_POST['Vehiculos']);

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
			$this->loadModel($id, 'Vehiculos')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Vehiculos');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Vehiculos('search');
		$model->unsetAttributes();

		if (isset($_GET['Vehiculos']))
			$model->setAttributes($_GET['Vehiculos']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
        
        public function actionACCombustibles() {
            
            if (isset($_GET['term'])) {
            $searchTerm = $_GET['term'];
            $result = array();
            $combustibles = Combustibles::model()->findAll('nombre LIKE :nombre', array(':nombre' => '%' . $searchTerm . '%'));

            foreach ($combustibles as $combustible) {
                $result[] = array(
                    'label' => $combustible->nombre, // label y value son usados por el juiautocomplete
                    'value' => $combustible->nombre,
                    'id' => $combustible->id,
                );
            }

                echo CJSON::encode($result);
            }
        }
        
        public function actionACTiposVehiculos() {
            if (isset($_GET['term'])) {
            $searchTerm = $_GET['term'];
            $result = array();
            $vehiculos = TiposVehiculos::model()->findAll('nombre LIKE :nombre', array(':nombre' => '%' . $searchTerm . '%'));

            foreach ($vehiculos as $vehiculo) {
                $result[] = array(
                    'label' => $vehiculo->nombre, // label y value son usados por el juiautocomplete
                    'value' => $vehiculo->nombre,
                    'id' => $vehiculo->id,
                );
            }

                echo CJSON::encode($result);
            }
        }
        
        public function actionACProveedor() {
            if (isset($_GET['term'])) {
            $searchTerm = $_GET['term'];
            $result = array();
            $vehiculos = Proveedores::model()->findAll('nombre LIKE :nombre', array(':nombre' => '%' . $searchTerm . '%'));

            foreach ($vehiculos as $vehiculo) {
                $result[] = array(
                    'label' => $vehiculo->nombre, // label y value son usados por el juiautocomplete
                    'value' => $vehiculo->nombre,
                    'id' => $vehiculo->id,
                );
            }

                echo CJSON::encode($result);
            }
        }
        
        public function actionACMarca() {
            if (isset($_GET['term'])) {
            $searchTerm = $_GET['term'];
            $result = array();
            $vehiculos = MarcasVehiculos::model()->findAll('nombre LIKE :nombre', array(':nombre' => '%' . $searchTerm . '%'));

            foreach ($vehiculos as $vehiculo) {
                $result[] = array(
                    'label' => $vehiculo->nombre, // label y value son usados por el juiautocomplete
                    'value' => $vehiculo->nombre,
                    'id' => $vehiculo->id,
                );
            }

                echo CJSON::encode($result);
            }
        }
        
        public function actionACModelo() {
            if (isset($_GET['term'])) {
            $searchTerm = $_GET['term'];
            $result = array();
            $vehiculos = ModelosVehiculos::model()->findAll('nombre LIKE :nombre', array(':nombre' => '%' . $searchTerm . '%'));

            foreach ($vehiculos as $vehiculo) {
                $result[] = array(
                    'label' => $vehiculo->nombre, // label y value son usados por el juiautocomplete
                    'value' => $vehiculo->nombre,
                    'id' => $vehiculo->id,
                );
            }

                echo CJSON::encode($result);
            }
        }
        
        public function actionACColor() {
            if (isset($_GET['term'])) {
            $searchTerm = $_GET['term'];
            $result = array();
            $vehiculos = ColoresVehiculos::model()->findAll('nombre LIKE :nombre', array(':nombre' => '%' . $searchTerm . '%'));

            foreach ($vehiculos as $vehiculo) {
                $result[] = array(
                    'label' => $vehiculo->nombre, // label y value son usados por el juiautocomplete
                    'value' => $vehiculo->nombre,
                    'id' => $vehiculo->id,
                );
            }

                echo CJSON::encode($result);
            }
        }
}