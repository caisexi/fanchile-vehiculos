<?php

/**
 * This is the model base class for the table "diesel".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Diesel".
 *
 * Columns in table "diesel" available as properties of the model,
 * followed by relations of table "diesel" available as properties of the model.
 *
 * @property integer $id
 * @property integer $id_planilla
 * @property integer $id_vehiculo
 * @property string $nro_factura
 * @property string $fecha
 * @property integer $region
 * @property string $estacion
 * @property string $litros
 * @property integer $precio_u
 * @property integer $especifico
 * @property integer $variable
 * @property integer $total
 * @property integer $costo_empresa
 * @property integer $nro_guia
 * @property integer $rollo
 *
 * @property PlanillasCopec $idPlanilla
 * @property Vehiculos $idVehiculo
 */
abstract class BaseDiesel extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'diesel';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Diesel|Diesels', $n);
	}

	public static function representingColumn() {
		return 'fecha';
	}

	public function rules() {
		return array(
			array('id_planilla, id_vehiculo, nro_factura, fecha, region, estacion, litros, precio_u, especifico, variable, total, costo_empresa, nro_guia, rollo', 'required'),
			array('id_planilla, id_vehiculo, region, precio_u, especifico, variable, total, costo_empresa, nro_guia, rollo', 'numerical', 'integerOnly'=>true),
			array('nro_factura', 'length', 'max'=>7),
			array('estacion', 'length', 'max'=>100),
			array('litros', 'length', 'max'=>10),
			array('id, id_planilla, id_vehiculo, nro_factura, fecha, region, estacion, litros, precio_u, especifico, variable, total, costo_empresa, nro_guia, rollo', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'idPlanilla' => array(self::BELONGS_TO, 'PlanillasCopec', 'id_planilla'),
			'idVehiculo' => array(self::BELONGS_TO, 'Vehiculos', 'id_vehiculo'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'id_planilla' => null,
			'id_vehiculo' => null,
			'nro_factura' => Yii::t('app', 'Nro Factura'),
			'fecha' => Yii::t('app', 'Fecha'),
			'region' => Yii::t('app', 'Region'),
			'estacion' => Yii::t('app', 'Estacion'),
			'litros' => Yii::t('app', 'Litros'),
			'precio_u' => Yii::t('app', 'Precio U'),
			'especifico' => Yii::t('app', 'Especifico'),
			'variable' => Yii::t('app', 'Variable'),
			'total' => Yii::t('app', 'Total'),
			'costo_empresa' => Yii::t('app', 'Costo Empresa'),
			'nro_guia' => Yii::t('app', 'Nro Guia'),
			'rollo' => Yii::t('app', 'Rollo'),
			'idPlanilla' => null,
			'idVehiculo' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('id_planilla', $this->id_planilla);
		$criteria->compare('id_vehiculo', $this->id_vehiculo);
		$criteria->compare('nro_factura', $this->nro_factura, true);
		$criteria->compare('fecha', $this->fecha, true);
		$criteria->compare('region', $this->region);
		$criteria->compare('estacion', $this->estacion, true);
		$criteria->compare('litros', $this->litros, true);
		$criteria->compare('precio_u', $this->precio_u);
		$criteria->compare('especifico', $this->especifico);
		$criteria->compare('variable', $this->variable);
		$criteria->compare('total', $this->total);
		$criteria->compare('costo_empresa', $this->costo_empresa);
		$criteria->compare('nro_guia', $this->nro_guia);
		$criteria->compare('rollo', $this->rollo);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}