<?php

class AreasEmpresaController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'AreasEmpresa'),
		));
	}

	public function actionCreate() {
		$model = new AreasEmpresa;


		if (isset($_POST['AreasEmpresa'])) {
			$model->setAttributes($_POST['AreasEmpresa']);

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
		$model = $this->loadModel($id, 'AreasEmpresa');


		if (isset($_POST['AreasEmpresa'])) {
			$model->setAttributes($_POST['AreasEmpresa']);

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
			$this->loadModel($id, 'AreasEmpresa')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('AreasEmpresa');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new AreasEmpresa('search');
		$model->unsetAttributes();

		if (isset($_GET['AreasEmpresa']))
			$model->setAttributes($_GET['AreasEmpresa']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}