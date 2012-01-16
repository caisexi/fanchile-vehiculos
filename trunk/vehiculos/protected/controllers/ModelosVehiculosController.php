<?php

class ModelosVehiculosController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'ModelosVehiculos'),
		));
	}

	public function actionCreate() {
		$model = new ModelosVehiculos;


		if (isset($_POST['ModelosVehiculos'])) {
			$model->setAttributes($_POST['ModelosVehiculos']);

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
		$model = $this->loadModel($id, 'ModelosVehiculos');


		if (isset($_POST['ModelosVehiculos'])) {
			$model->setAttributes($_POST['ModelosVehiculos']);

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
			$this->loadModel($id, 'ModelosVehiculos')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('ModelosVehiculos');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new ModelosVehiculos('search');
		$model->unsetAttributes();

		if (isset($_GET['ModelosVehiculos']))
			$model->setAttributes($_GET['ModelosVehiculos']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}