<?php

class DetalleReparacionController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'DetalleReparacion'),
		));
	}

	public function actionCreate() {
		$model = new DetalleReparacion;


		if (isset($_POST['DetalleReparacion'])) {
			$model->setAttributes($_POST['DetalleReparacion']);

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
		$model = $this->loadModel($id, 'DetalleReparacion');


		if (isset($_POST['DetalleReparacion'])) {
			$model->setAttributes($_POST['DetalleReparacion']);

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
			$this->loadModel($id, 'DetalleReparacion')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('DetalleReparacion');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new DetalleReparacion('search');
		$model->unsetAttributes();

		if (isset($_GET['DetalleReparacion']))
			$model->setAttributes($_GET['DetalleReparacion']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}