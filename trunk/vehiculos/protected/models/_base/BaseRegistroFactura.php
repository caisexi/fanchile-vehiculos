<?php

/**
 * This is the model base class for the table "registro_factura".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "RegistroFactura".
 *
 * Columns in table "registro_factura" available as properties of the model,
 * followed by relations of table "registro_factura" available as properties of the model.
 *
 * @property integer $id
 * @property integer $nro_factura
 * @property integer $total_neto
 * @property integer $total_bruto
 * @property integer $id_proveedor
 * @property string $fecha
 * @property string $creado
 * @property string $modificado
 *
 * @property OrdenTrabajo[] $ordenTrabajos
 * @property Proveedores $idProveedor
 */
abstract class BaseRegistroFactura extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'registro_factura';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Factura|Facturas', $n);
	}

	public static function representingColumn() {
		return 'nro_factura';
	}

	public function rules() {
		return array(
			array('nro_factura, id_proveedor, fecha, creado, modificado', 'required'),
			array('nro_factura, total_neto, total_bruto, id_proveedor', 'numerical', 'integerOnly'=>true),
                        array('nro_factura', 'length','max'=>7),
			array('id, nro_factura, total_neto, total_bruto, id_proveedor, fecha, creado, modificado', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'ordenTrabajos' => array(self::HAS_MANY, 'OrdenTrabajo', 'id_rf'),
			'idProveedor' => array(self::BELONGS_TO, 'Proveedores', 'id_proveedor'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'nro_factura' => Yii::t('app', 'Nro Factura'),
			'total_neto' => Yii::t('app', 'Total Neto'),
			'total_bruto' => Yii::t('app', 'Total Bruto'),
			'id_proveedor' => null,
			'fecha' => Yii::t('app', 'Fecha'),
			'creado' => Yii::t('app', 'Creado'),
			'modificado' => Yii::t('app', 'Modificado'),
			'ordenTrabajos' => null,
			'idProveedor' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;
                
		$criteria->compare('nro_factura', $this->nro_factura);
		$criteria->compare('total_neto', $this->total_neto);
		$criteria->compare('total_bruto', $this->total_bruto);
		$criteria->compare('id_proveedor', $this->id_proveedor);
		$criteria->compare('fecha', $this->fecha, true);
		$criteria->compare('creado', $this->creado, true);
		$criteria->compare('modificado', $this->modificado, true);
                
                $criteria->compare('ordenTrabajos.id', $this->id, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
        
        public function beforeValidate() {
            if ($this->isNewRecord)
            {
                $this->creado = new CDbExpression('NOW()');
            }

            $this->modificado = new CDbExpression('NOW()');
            

            return parent::beforeSave();
        } 
        
        public function sumarNeto() {
            $totalneto = 0;
            foreach($this->ordenTrabajos as $ots)
                $totalneto = $totalneto + $ots->sumita;
            return $totalneto;
        }
        
        public function formatearKm($numerillo) {            
            return number_format($numerillo, 0, ',', '.');
        }
}