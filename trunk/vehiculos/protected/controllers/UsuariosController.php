<?php

class UsuariosController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Usuarios'),
		));
	}

	public function actionCreate() {
		$model = new Usuarios;


		if (isset($_POST['Usuarios'])) {
			$model->setAttributes($_POST['Usuarios']);

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
		$model = $this->loadModel($id, 'Usuarios');


		if (isset($_POST['Usuarios'])) {
			$model->setAttributes($_POST['Usuarios']);

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
			$this->loadModel($id, 'Usuarios')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Usuarios');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Usuarios('search');
		$model->unsetAttributes();

		if (isset($_GET['Usuarios']))
			$model->setAttributes($_GET['Usuarios']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}