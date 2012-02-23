<?php

class GasolinaController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Gasolina'),
		));
	}

	public function actionCreate() {
		$model = new Gasolina;


		if (isset($_POST['Gasolina'])) {
			$model->setAttributes($_POST['Gasolina']);

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
		$model = $this->loadModel($id, 'Gasolina');


		if (isset($_POST['Gasolina'])) {
			$model->setAttributes($_POST['Gasolina']);

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
			$this->loadModel($id, 'Gasolina')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Gasolina');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Gasolina('search');
		$model->unsetAttributes();

		if (isset($_GET['Gasolina']))
			$model->setAttributes($_GET['Gasolina']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}