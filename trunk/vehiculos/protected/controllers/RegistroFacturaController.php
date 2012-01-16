<?php

class RegistroFacturaController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'RegistroFactura'),
		));
	}

	public function actionCreate() {
		$model = new RegistroFactura;

		if (isset($_POST['RegistroFactura'])) {
			$model->setAttributes($_POST['RegistroFactura']);

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
            
                Yii::import('ext.multimodelform.MultiModelForm');                
          
		$model = $this->loadModel($id, 'RegistroFactura');


		if (isset($_POST['RegistroFactura'])) {
			$model->setAttributes($_POST['RegistroFactura']);
                        
                        $masterValues = array ('groupid'=>$model->id);

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
			$this->loadModel($id, 'RegistroFactura')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('RegistroFactura');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new RegistroFactura('search');
		$model->unsetAttributes();

		if (isset($_GET['RegistroFactura']))
			$model->setAttributes($_GET['RegistroFactura']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}