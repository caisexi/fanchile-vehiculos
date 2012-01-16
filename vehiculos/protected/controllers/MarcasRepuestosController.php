<?php

class MarcasRepuestosController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'MarcasRepuestos'),
		));
	}

	public function actionCreate() {
		$model = new MarcasRepuestos;


		if (isset($_POST['MarcasRepuestos'])) {
			$model->setAttributes($_POST['MarcasRepuestos']);

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
		$model = $this->loadModel($id, 'MarcasRepuestos');


		if (isset($_POST['MarcasRepuestos'])) {
			$model->setAttributes($_POST['MarcasRepuestos']);

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
			$this->loadModel($id, 'MarcasRepuestos')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('MarcasRepuestos');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new MarcasRepuestos('search');
		$model->unsetAttributes();

		if (isset($_GET['MarcasRepuestos']))
			$model->setAttributes($_GET['MarcasRepuestos']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}