<?php

class DieselController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Diesel'),
		));
	}

	public function actionCreate() {
		$model = new Diesel;


		if (isset($_POST['Diesel'])) {
			$model->setAttributes($_POST['Diesel']);

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
		$model = $this->loadModel($id, 'Diesel');


		if (isset($_POST['Diesel'])) {
			$model->setAttributes($_POST['Diesel']);

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
			$this->loadModel($id, 'Diesel')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Diesel');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Diesel('search');
		$model->unsetAttributes();

		if (isset($_GET['Diesel']))
			$model->setAttributes($_GET['Diesel']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}