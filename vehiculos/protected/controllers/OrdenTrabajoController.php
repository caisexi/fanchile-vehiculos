<?php

class OrdenTrabajoController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'OrdenTrabajo'),
		));
	}

	public function actionCreate() {

                Yii::import('ext.multimodelform.MultiModelForm');
                
		$model = new OrdenTrabajo;
                
                $detalle = new DetallesOt;
                
                $detallesValidados = array();

		if (isset($_POST['OrdenTrabajo'])) {
			$model->setAttributes($_POST['OrdenTrabajo']);

			if (MultiModelForm::validate($detalle,$detallesValidados,$detallesBorrados) && $model->save()) {
                            
				$masterValues = array ('id_ot'=>$model->id);
                                
                                if (MultiModelForm::save($detalle,$detallesValidados,$detallesBorrados,$masterValues))
                                {
                                        $factura = $this->loadModel($model->id_rf, 'RegistroFactura');
                                        $suma = $model->sumita;
                                        $suma_neto = $suma + $factura->total_neto;
                                        $iva = Ivas::model()->findBySql('SELECT valor_iva FROM ivas ORDER BY fecha DESC');
                                        $suma_bruto = $suma_neto * (($iva['valor_iva']/100)+1);
                                        $factura->setAttributes(array('total_neto'=>$suma_neto, 'total_bruto'=>round($suma_bruto)));
                                        if($factura->save())
                                            $this->redirect(array('registrofactura/view', 'id' => $factura->id));
                                }
			}
		}

		$this->render('create', array( 'model' => $model, 'detalle' => $detalle, 'detallesValidados' => $detallesValidados));
	}

	public function actionUpdate($id) {
                Yii::import('ext.multimodelform.MultiModelForm');
                
		$model = $this->loadModel($id, 'OrdenTrabajo');
                
                $detalle = new DetallesOt;
                
                $detallesValidados = array();

		if (isset($_POST['OrdenTrabajo'])) {
			$model->setAttributes($_POST['OrdenTrabajo']);
                        
                        $masterValues = array ('id_ot'=>$model->id);

			if (MultiModelForm::save($detalle,$detallesValidados,$detallesBorrados,$masterValues) && $model->save()) {
				$factura = $this->loadModel($model->id_rf, 'RegistroFactura');
                                        $suma = $model->sumita;
                                        $iva = Ivas::model()->findBySql('SELECT valor_iva FROM ivas ORDER BY fecha DESC');
                                        $suma_bruto = $suma * (($iva['valor_iva']/100)+1);
                                        $factura->setAttributes(array('total_neto'=>$suma, 'total_bruto'=>round($suma_bruto)));
                                        if($factura->save())
                                            $this->redirect(array('registrofactura/view', 'id' => $factura->id));
			}
		}

		$this->render('update', array(
				'model' => $model, 'detalle' => $detalle, 'detallesValidados' => $detallesValidados,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'OrdenTrabajo')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('OrdenTrabajo');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new OrdenTrabajo('search');
		$model->unsetAttributes();

		if (isset($_GET['OrdenTrabajo']))
			$model->setAttributes($_GET['OrdenTrabajo']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}