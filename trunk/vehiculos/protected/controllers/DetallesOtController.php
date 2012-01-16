<?php

class DetallesOtController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'DetallesOt'),
		));
	}

	public function actionCreate() {
		$model = new DetallesOt;


		if (isset($_POST['DetallesOt'])) {
			$model->setAttributes($_POST['DetallesOt']);

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
		$model = $this->loadModel($id, 'DetallesOt');


		if (isset($_POST['DetallesOt'])) {
			$model->setAttributes($_POST['DetallesOt']);

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
			$this->loadModel($id, 'DetallesOt')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('DetallesOt');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new DetallesOt('search');
		$model->unsetAttributes();

		if (isset($_GET['DetallesOt']))
			$model->setAttributes($_GET['DetallesOt']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}