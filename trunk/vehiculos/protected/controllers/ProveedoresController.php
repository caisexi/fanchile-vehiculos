<?php

class ProveedoresController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Proveedores'),
		));
	}

	public function actionCreate() {
		$model = new Proveedores;


		if (isset($_POST['Proveedores'])) {
			$model->setAttributes($_POST['Proveedores']);

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
		$model = $this->loadModel($id, 'Proveedores');


		if (isset($_POST['Proveedores'])) {
			$model->setAttributes($_POST['Proveedores']);

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
			$this->loadModel($id, 'Proveedores')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Proveedores');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Proveedores('search');
		$model->unsetAttributes();

		if (isset($_GET['Proveedores']))
			$model->setAttributes($_GET['Proveedores']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}