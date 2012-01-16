<?php

class TiposVehiculosController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'TiposVehiculos'),
		));
	}

	public function actionCreate() {
		$model = new TiposVehiculos;


		if (isset($_POST['TiposVehiculos'])) {
			$model->setAttributes($_POST['TiposVehiculos']);

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
		$model = $this->loadModel($id, 'TiposVehiculos');


		if (isset($_POST['TiposVehiculos'])) {
			$model->setAttributes($_POST['TiposVehiculos']);

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
			$this->loadModel($id, 'TiposVehiculos')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('TiposVehiculos');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new TiposVehiculos('search');
		$model->unsetAttributes();

		if (isset($_GET['TiposVehiculos']))
			$model->setAttributes($_GET['TiposVehiculos']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}