<?php

/**
 * This is the model base class for the table "det_factura_combustible".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "DetFacturaCombustible".
 *
 * Columns in table "det_factura_combustible" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property integer $id_factura_combustible
 * @property integer $id_vehiculo
 * @property integer $nro_guia
 * @property string $litros
 * @property string $creado
 * @property string $modificado
 *
 */
abstract class BaseDetFacturaCombustible extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'det_factura_combustible';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'DetFacturaCombustible|DetFacturaCombustibles', $n);
	}

	public static function representingColumn() {
		return 'litros';
	}

	public function rules() {
		return array(
			array('id_factura_combustible, id_vehiculo, nro_guia, litros, creado, modificado', 'required'),
			array('id_factura_combustible, id_vehiculo, nro_guia', 'numerical', 'integerOnly'=>true),
			array('litros', 'length', 'max'=>10),
			array('id, id_factura_combustible, id_vehiculo, nro_guia, litros, creado, modificado', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'id_factura_combustible' => Yii::t('app', 'Id Factura Combustible'),
			'id_vehiculo' => Yii::t('app', 'Id Vehiculo'),
			'nro_guia' => Yii::t('app', 'Nro Guia'),
			'litros' => Yii::t('app', 'Litros'),
			'creado' => Yii::t('app', 'Creado'),
			'modificado' => Yii::t('app', 'Modificado'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('id_factura_combustible', $this->id_factura_combustible);
		$criteria->compare('id_vehiculo', $this->id_vehiculo);
		$criteria->compare('nro_guia', $this->nro_guia);
		$criteria->compare('litros', $this->litros, true);
		$criteria->compare('creado', $this->creado, true);
		$criteria->compare('modificado', $this->modificado, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}