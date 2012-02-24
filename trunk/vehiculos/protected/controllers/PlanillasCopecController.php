<?php

class PlanillasCopecController extends GxController {

public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow',
				'actions'=>array('index','view'),
				'users'=>array('*'),
				),
			array('allow', 
				'actions'=>array('minicreate', 'create','update'),
				'users'=>array('@'),
				),
			array('allow', 
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
				),
			array('deny', 
				'users'=>array('*'),
				),
			);
}

	public function actionView($id) {
                $tipo = $this->loadModel($id, 'PlanillasCopec')->tipo_planilla;
                if ($tipo == 0)
                {
                    $dataProvider = new CActiveDataProvider('Diesel', array(
                        'pagination'=>array(
                            'pageSize'=>30,
                        ),
                        'criteria' => array(
                            'condition' => 'id_planilla = :planilla',
                            'params' => array(
                            ':planilla' => $this->loadModel($id, 'PlanillasCopec')->id,
                            ),
                        ),
                    ));
                }
                elseif($tipo == 1)
                {
                    $dataProvider = new CActiveDataProvider('Gasolina', array(
                        'pagination'=>array(
                            'pageSize'=>30,
                        ),
                        'criteria' => array(
                            'condition' => 'id_planilla = :planilla',
                            'params' => array(
                            ':planilla' => $this->loadModel($id, 'PlanillasCopec')->id,
                            ),
                        ),
                    ));
                }
                
		$this->render('view', array(
			'model' => $this->loadModel($id, 'PlanillasCopec'),
                        'dataProvider' => $dataProvider,
                        'tipo' => $tipo, 
		));
	}

	public function actionCreate() {
		$model = new PlanillasCopec;


		if (isset($_POST['PlanillasCopec'])) {
			$model->setAttributes($_POST['PlanillasCopec']);

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
		$model = $this->loadModel($id, 'PlanillasCopec');


		if (isset($_POST['PlanillasCopec'])) {
			$model->setAttributes($_POST['PlanillasCopec']);

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
			$this->loadModel($id, 'PlanillasCopec')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('PlanillasCopec');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new PlanillasCopec('search');
		$model->unsetAttributes();

		if (isset($_GET['PlanillasCopec']))
			$model->setAttributes($_GET['PlanillasCopec']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}