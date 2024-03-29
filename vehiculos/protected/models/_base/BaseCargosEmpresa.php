<?php

/**
 * This is the model base class for the table "cargos_empresa".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "CargosEmpresa".
 *
 * Columns in table "cargos_empresa" available as properties of the model,
 * followed by relations of table "cargos_empresa" available as properties of the model.
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $id_area_empresa
 *
 * @property AreasEmpresa $idAreaEmpresa
 * @property Personal[] $personals
 */
abstract class BaseCargosEmpresa extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'cargos_empresa';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Cargo Empresa|Cargos Empresa', $n);
	}

	public static function representingColumn() {
		return 'nombre';
	}

	public function rules() {
		return array(
			array('nombre', 'required'),
			array('id_area_empresa', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>40),
			array('id_area_empresa', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, nombre, id_area_empresa', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'idAreaEmpresa' => array(self::BELONGS_TO, 'AreasEmpresa', 'id_area_empresa'),
			'personals' => array(self::HAS_MANY, 'Personal', 'id_cargo_empresa'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'nombre' => Yii::t('app', 'Nombre'),
			'id_area_empresa' => null,
			'idAreaEmpresa' => null,
			'personals' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('nombre', $this->nombre, true);
		$criteria->compare('id_area_empresa', $this->id_area_empresa);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}