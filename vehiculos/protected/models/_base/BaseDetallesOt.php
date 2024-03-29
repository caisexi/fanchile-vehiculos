<?php

/**
 * This is the model base class for the table "detalles_ot".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "DetallesOt".
 *
 * Columns in table "detalles_ot" available as properties of the model,
 * followed by relations of table "detalles_ot" available as properties of the model.
 *
 * @property integer $id
 * @property integer $id_detalle_reparacion
 * @property integer $id_ot
 * @property integer $id_marca
 * @property integer $cantidad
 * @property integer $precio_unitario
 * @property integer $subtotal
 * @property string $observacion
 *
 * @property DetalleReparacion $idDetalleReparacion
 * @property OrdenTrabajo $idOt
 * @property MarcasRepuestos $idMarca
 */
abstract class BaseDetallesOt extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'detalles_ot';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'DetallesOt|DetallesOts', $n);
	}

	public static function representingColumn() {
		return 'idOt';
	}

	public function rules() {
		return array(
			array('precio_unitario, subtotal', 'required'),
			array('id_detalle_reparacion, id_ot, id_marca, cantidad, precio_unitario, subtotal', 'numerical', 'integerOnly'=>true),
			array('observacion', 'safe'),
			array('id_detalle_reparacion, id_marca, cantidad, observacion', 'default', 'setOnEmpty' => true, 'value' => null),        
			array('id, id_detalle_reparacion, id_ot, id_marca, cantidad, precio_unitario, subtotal, observacion', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'idDetalleReparacion' => array(self::BELONGS_TO, 'DetalleReparacion', 'id_detalle_reparacion'),
			'idOt' => array(self::BELONGS_TO, 'OrdenTrabajo', 'id_ot'),
			'idMarca' => array(self::BELONGS_TO, 'MarcasRepuestos', 'id_marca'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'id_detalle_reparacion' => null,
			'id_ot' => null,
			'id_marca' => null,
			'cantidad' => Yii::t('app', 'Cantidad'),
			'precio_unitario' => Yii::t('app', 'Precio Unitario'),
			'subtotal' => Yii::t('app', 'Subtotal'),
			'observacion' => Yii::t('app', 'Observacion'),
			'idDetalleReparacion' => null,
			'idOt' => null,
			'idMarca' => null,
		);
	}

        
	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('id_detalle_reparacion', $this->id_detalle_reparacion);
		$criteria->compare('id_ot', $this->id_ot);
		$criteria->compare('id_marca', $this->id_marca);
		$criteria->compare('cantidad', $this->cantidad);
		$criteria->compare('precio_unitario', $this->precio_unitario);
		$criteria->compare('subtotal', $this->subtotal);
		$criteria->compare('observacion', $this->observacion, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}