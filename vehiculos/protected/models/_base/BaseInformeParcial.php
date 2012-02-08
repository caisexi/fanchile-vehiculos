<?php

/**
 * This is the model base class for the table "informe_parcial".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "InformeParcial".
 *
 * Columns in table "informe_parcial" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property integer $id_patente
 * @property integer $id_usuario
 * @property integer $id_area
 * @property integer $total_reparaciones
 * @property integer $total_acumulado
 * @property integer $recorrido_parcial
 * @property string $pesos_km
 * @property string $fecha_inicial
 * @property string $fecha_final
 *
 */
abstract class BaseInformeParcial extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'informe_parcial';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'InformeParcial|InformeParcials', $n);
	}

	public static function representingColumn() {
		return 'pesos_km';
	}

	public function rules() {
		return array(
			array('id_patente, id_usuario, id_area, total_reparaciones, total_acumulado, recorrido_parcial, pesos_km, fecha_inicial, fecha_final', 'required'),
			array('id_patente, id_usuario, id_area, total_reparaciones, total_acumulado, recorrido_parcial', 'numerical', 'integerOnly'=>true),
			array('pesos_km', 'length', 'max'=>10),
			array('id, id_patente, id_usuario, id_area, total_reparaciones, total_acumulado, recorrido_parcial, pesos_km, fecha_inicial, fecha_final', 'safe', 'on'=>'search'),
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
			'id_patente' => Yii::t('app', 'Id Patente'),
			'id_usuario' => Yii::t('app', 'Id Usuario'),
			'id_area' => Yii::t('app', 'Id Area'),
			'total_reparaciones' => Yii::t('app', 'Total Reparaciones'),
			'total_acumulado' => Yii::t('app', 'Total Acumulado'),
			'recorrido_parcial' => Yii::t('app', 'Recorrido Parcial'),
			'pesos_km' => Yii::t('app', 'Pesos Km'),
			'fecha_inicial' => Yii::t('app', 'Fecha Inicial'),
			'fecha_final' => Yii::t('app', 'Fecha Final'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('id_patente', $this->id_patente);
		$criteria->compare('id_usuario', $this->id_usuario);
		$criteria->compare('id_area', $this->id_area);
		$criteria->compare('total_reparaciones', $this->total_reparaciones);
		$criteria->compare('total_acumulado', $this->total_acumulado);
		$criteria->compare('recorrido_parcial', $this->recorrido_parcial);
		$criteria->compare('pesos_km', $this->pesos_km, true);
		$criteria->compare('fecha_inicial', $this->fecha_inicial, true);
		$criteria->compare('fecha_final', $this->fecha_final, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}