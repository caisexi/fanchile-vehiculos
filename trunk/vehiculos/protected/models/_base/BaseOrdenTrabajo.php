<?php

/**
 * This is the model base class for the table "orden_trabajo".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "OrdenTrabajo".
 *
 * Columns in table "orden_trabajo" available as properties of the model,
 * followed by relations of table "orden_trabajo" available as properties of the model.
 *
 * @property integer $id
 * @property integer $nro_guia
 * @property integer $id_vehiculo
 * @property integer $id_rf
 * @property string $fecha
 * @property string $kilometraje
 * @property string $creado
 * @property string $modificado
 *
 * @property DetallesOt[] $detallesOts
 * @property Vehiculos $idVehiculo
 * @property RegistroFactura $idRf
 */
abstract class BaseOrdenTrabajo extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'orden_trabajo';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Orden de Trabajo|Ordenes de Trabajo', $n);
	}

	public static function representingColumn() {
		return 'nro_guia';
	}

	public function rules() {
		return array(
			array('nro_guia, id_vehiculo, id_rf, fecha, creado, modificado', 'required'),
			array('nro_guia, id_vehiculo, id_rf', 'numerical', 'integerOnly'=>true),
			array('kilometraje', 'length', 'max'=>7),
			array('kilometraje', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, nro_guia, id_vehiculo, id_rf, fecha, kilometraje, creado, modificado', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'detallesOts' => array(self::HAS_MANY, 'DetallesOt', 'id_ot'),
			'idVehiculo' => array(self::BELONGS_TO, 'Vehiculos', 'id_vehiculo'),
			'idRf' => array(self::BELONGS_TO, 'RegistroFactura', 'id_rf'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'nro_guia' => Yii::t('app', 'Nro Guia'),
			'id_vehiculo' => null,
			'id_rf' => null,
			'fecha' => Yii::t('app', 'Fecha'),
			'kilometraje' => Yii::t('app', 'Kilometraje'),
			'creado' => Yii::t('app', 'Creado'),
			'modificado' => Yii::t('app', 'Modificado'),
			'detallesOts' => null,
			'idVehiculo' => null,
			'idRf' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('nro_guia', $this->nro_guia);
		$criteria->compare('id_vehiculo', $this->id_vehiculo);
		$criteria->compare('id_rf', $this->id_rf);
		$criteria->compare('fecha', $this->fecha, true);
		$criteria->compare('kilometraje', $this->kilometraje, true);
		$criteria->compare('creado', $this->creado, true);
		$criteria->compare('modificado', $this->modificado, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
        
        public function getMultiModelForm() {
            $memberFormConfig = array(
              'elements'=>array(
                'id_detalle_reparacion'=>array(
                    'type'=>'dropdownlist',
                    'items'=>array(''=>'SELECCIONAR')+GxHtml::listDataEx(DetalleReparacion::model()->findAllAttributes(null, true)),
                ),
                'id_marca'=>array(
                    'type'=>'dropdownlist',
                    //it is important to add an empty item because of new records
                    'items'=>array(''=>'SELECCIONAR')+GxHtml::listDataEx(MarcasRepuestos::model()->findAllAttributes(null, true)),
                ),
                'precio_unitario'=>array(
                    'type'=>'text',
                    'maxlength'=>11,
                    'size'=>11,
                    'onblur'=>'subtotal()',
                ),
                'cantidad'=>array(
                    'type'=>'text',
                    'maxlength'=>7,
                    'size'=>7,
                    'onblur'=>'subtotal()',
                ),
                'subtotal'=>array(
                    'type'=>'text',
                    'maxlength'=>11,
                    'size'=>11,
                ),
                'observacion'=>array(
                    'type'=>'textarea',
                    'cols'=>15,
                    'row'=>3,
                ),
            ));
            
            return $memberFormConfig;
        }
        
        public function beforeValidate() {
            if ($this->isNewRecord)
                $this->creado = new CDbExpression('NOW()');

            $this->modificado = new CDbExpression('NOW()');

            return parent::beforeSave();
        }
}