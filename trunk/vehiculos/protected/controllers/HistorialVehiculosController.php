<?php

class HistorialVehiculosController extends GxController {


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

}