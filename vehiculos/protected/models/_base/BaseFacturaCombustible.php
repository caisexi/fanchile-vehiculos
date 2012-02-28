<?php

/**
 * This is the model base class for the table "factura_combustible".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "FacturaCombustible".
 *
 * Columns in table "factura_combustible" available as properties of the model,
 * followed by relations of table "factura_combustible" available as properties of the model.
 *
 * @property integer $id
 * @property string $nro_factura
 * @property string $fecha
 * @property integer $id_combustible
 * @property integer $neto
 * @property integer $iva
 * @property integer $especifico
 * @property string $litros
 * @property integer $total
 * @property integer $valor_lt
 * @property integer $valor_guia
 * @property string $creado
 * @property string $modificado
 *
 * @property DetFacturaCombustible[] $detFacturaCombustibles
 * @property Combustibles $idCombustible
 */
abstract class BaseFacturaCombustible extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'factura_combustible';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Factura de Combustible|Facturas de Combustibles', $n);
	}

	public static function representingColumn() {
		return 'nro_factura';
	}

	public function rules() {
		return array(
			array('nro_factura, fecha, id_combustible, neto, iva, especifico, litros, total, valor_lt, valor_guia, creado, modificado', 'required'),
			array('id_combustible, neto, iva, especifico, total, valor_lt, valor_guia', 'numerical', 'integerOnly'=>true),
			array('nro_factura, litros', 'length', 'max'=>10),
			array('id, nro_factura, fecha, id_combustible, neto, iva, especifico, litros, total, valor_lt, valor_guia, creado, modificado', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'detFacturaCombustibles' => array(self::HAS_MANY, 'DetFacturaCombustible', 'id_factura_combustible'),
			'idCombustible' => array(self::BELONGS_TO, 'Combustibles', 'id_combustible'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'nro_factura' => Yii::t('app', 'Nro Factura'),
			'fecha' => Yii::t('app', 'Fecha'),
			'id_combustible' => null,
			'neto' => Yii::t('app', 'Neto'),
			'iva' => Yii::t('app', 'IVA'),
			'especifico' => Yii::t('app', 'Especifico'),
			'litros' => Yii::t('app', 'Litros'),
			'total' => Yii::t('app', 'Total'),
			'valor_lt' => Yii::t('app', 'Valor Lt'),
			'valor_guia' => Yii::t('app', 'Valor Guia'),
			'creado' => Yii::t('app', 'Creado'),
			'modificado' => Yii::t('app', 'Modificado'),
			'detFacturaCombustibles' => null,
			'idCombustible' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('nro_factura', $this->nro_factura, true);
		$criteria->compare('fecha', $this->fecha, true);
		$criteria->compare('id_combustible', $this->id_combustible);
		$criteria->compare('neto', $this->neto);
		$criteria->compare('iva', $this->iva);
		$criteria->compare('especifico', $this->especifico);
		$criteria->compare('litros', $this->litros, true);
		$criteria->compare('total', $this->total);
		$criteria->compare('valor_lt', $this->valor_lt);
		$criteria->compare('valor_guia', $this->valor_guia);
		$criteria->compare('creado', $this->creado, true);
		$criteria->compare('modificado', $this->modificado, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
        
        public function getMultiModelForm() {
            $criteria=new CDbCriteria;                        
            $criteria->order='patente ASC';
            $detfactcomb = array(
              'elements'=>array(
                'id_vehiculo'=>array(
                    'type'=>'dropdownlist',
                    'items'=>array(''=>'---')+GxHtml::listDataEx(Vehiculos::model()->findAllAttributes(null, true, $criteria)),
                ),
                'nro_guia'=>array(
                    'type'=>'text',                    
                ),
                'litros'=>array(
                    'type'=>'text',
                ),
            ));            
            return $detfactcomb;
        }
        
        public function beforeValidate() {
            if ($this->isNewRecord)
                $this->creado = new CDbExpression('NOW()');

            $this->modificado = new CDbExpression('NOW()');

            return parent::beforeSave();
        }
}