<?php

class VehiculosController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Vehiculos'),
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