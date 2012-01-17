<?php

class RegistroFacturaController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'RegistroFactura'),
		));
	}

	public function actionCreate() {            
                Yii::import('ext.multimodelform.MultiModelForm');
                
		$model = new RegistroFactura;
                
                $model_ot = new OrdenTrabajo();
                
                $validatedOt = array();
                
		if (isset($_POST['RegistroFactura'])) {
			$model->attributes=$_POST['RegistroFactura'];
                        
                        if(MultiModelForm::validate($model_ot,$validatedOt,$deleteOt) && $model->save()) {
                            
                            $masterValues = array ('id_rf'=>$model->id);
                            
                            if (Yii::app()->getRequest()->getIsAjaxRequest())
                            {
                                Yii::app()->end();
                            }
				else
                                {
                                    if(MultiModelForm::save($model_ot,$validatedOt,$deleteOt,$masterValues))
                                    {
                                        $this->redirect(array('view', 'id' => $model->id));
                                    }
                                }
			}
		}

		$this->render('create', array(
				'model' => $model,
                                'model_ot' => $model_ot,
                                'validatedOt' => $validatedOt,
				));
	}

	public function actionUpdate($id) {
            
                Yii::import('ext.multimodelform.MultiModelForm');                
          
		$model = $this->loadModel($id, 'RegistroFactura');
                
                $model_ot = new OrdenTrabajo();
                
                $validatedOt = array();

		if (isset($_POST['RegistroFactura'])) {
			$model->setAttributes($_POST['RegistroFactura']);
                        
                        $masterValues = array ('id_rf'=>$model->id);

			if(MultiModelForm::save($model_ot,$validatedOt,$deleteOt,$masterValues) && $model->save()) 
                        {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
                                'model_ot' => $model_ot,
                                'validatedOt' => $validatedOt,
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