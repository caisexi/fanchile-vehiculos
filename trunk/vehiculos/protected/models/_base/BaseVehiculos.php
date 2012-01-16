<?php

/**
 * This is the model base class for the table "vehiculos".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Vehiculos".
 *
 * Columns in table "vehiculos" available as properties of the model,
 * followed by relations of table "vehiculos" available as properties of the model.
 *
 * @property integer $id
 * @property integer $idCombustible
 * @property integer $idTipoVehiculo
 * @property integer $idProveedor
 * @property integer $idMarca
 * @property integer $idModelo
 * @property integer $idColor
 * @property string $ano
 * @property string $patente
 * @property integer $precioCompra
 * @property integer $estado
 * @property string $foto
 * @property string $creado
 * @property string $modificado
 *
 * @property HistorialVehiculos[] $historialVehiculoses
 * @property OrdenTrabajo[] $ordenTrabajos
 * @property Combustibles $idCombustible0
 * @property TiposVehiculos $idTipoVehiculo0
 * @property Proveedores $idProveedor0
 * @property MarcasVehiculos $idMarca0
 * @property ModelosVehiculos $idModelo0
 * @property ColoresVehiculos $idColor0
 */
abstract class BaseVehiculos extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'vehiculos';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Vehiculo|Vehiculos', $n);
	}

	public static function representingColumn() {
		return 'patente';
	}

	public function rules() {
		return array(
			array('idCombustible, idTipoVehiculo, idProveedor, idMarca, idModelo, ano, patente, precioCompra, estado, creado, modificado', 'required'),
			array('idCombustible, idTipoVehiculo, idProveedor, idMarca, idModelo, idColor, precioCompra, estado', 'numerical', 'integerOnly'=>true),
			array('ano', 'length', 'max'=>4),
			array('patente', 'length', 'max'=>6),
			array('foto', 'safe'),
			array('idColor, foto', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, idCombustible, idTipoVehiculo, idProveedor, idMarca, idModelo, idColor, ano, patente, precioCompra, estado, foto, creado, modificado', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'historialVehiculoses' => array(self::HAS_MANY, 'HistorialVehiculos', 'id_vehiculo'),
			'ordenTrabajos' => array(self::HAS_MANY, 'OrdenTrabajo', 'id_vehiculo'),
			'idCombustible0' => array(self::BELONGS_TO, 'Combustibles', 'idCombustible'),
			'idTipoVehiculo0' => array(self::BELONGS_TO, 'TiposVehiculos', 'idTipoVehiculo'),
			'idProveedor0' => array(self::BELONGS_TO, 'Proveedores', 'idProveedor'),
			'idMarca0' => array(self::BELONGS_TO, 'MarcasVehiculos', 'idMarca'),
			'idModelo0' => array(self::BELONGS_TO, 'ModelosVehiculos', 'idModelo'),
			'idColor0' => array(self::BELONGS_TO, 'ColoresVehiculos', 'idColor'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'idCombustible' => null,
			'idTipoVehiculo' => null,
			'idProveedor' => null,
			'idMarca' => null,
			'idModelo' => null,
			'idColor' => null,
			'ano' => Yii::t('app', 'Ano'),
			'patente' => Yii::t('app', 'Patente'),
			'precioCompra' => Yii::t('app', 'Precio Compra'),
			'estado' => Yii::t('app', 'Estado'),
			'foto' => Yii::t('app', 'Foto'),
			'creado' => Yii::t('app', 'Creado'),
			'modificado' => Yii::t('app', 'Modificado'),
			'historialVehiculoses' => null,
			'ordenTrabajos' => null,
			'idCombustible0' => null,
			'idTipoVehiculo0' => null,
			'idProveedor0' => null,
			'idMarca0' => null,
			'idModelo0' => null,
			'idColor0' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('idCombustible', $this->idCombustible);
		$criteria->compare('idTipoVehiculo', $this->idTipoVehiculo);
		$criteria->compare('idProveedor', $this->idProveedor);
		$criteria->compare('idMarca', $this->idMarca);
		$criteria->compare('idModelo', $this->idModelo);
		$criteria->compare('idColor', $this->idColor);
		$criteria->compare('ano', $this->ano, true);
		$criteria->compare('patente', $this->patente, true);
		$criteria->compare('precioCompra', $this->precioCompra);
		$criteria->compare('estado', $this->estado);
		$criteria->compare('foto', $this->foto, true);
		$criteria->compare('creado', $this->creado, true);
		$criteria->compare('modificado', $this->modificado, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
        public function beforeValidate() {
            if ($this->isNewRecord)
                $this->creado = new CDbExpression('NOW()');

            $this->modificado = new CDbExpression('NOW()');

            return parent::beforeSave();
        }
        
        public function formatearPeso($numerillo) {
            
            return '$'.number_format($numerillo, 0, ',', '.');
        }
        
        public function formatearPatente($patente) {
            
            $primer = strtoupper(substr($patente,0,-4));
            $segundo = strtoupper(substr($patente,2,-2));
            $tercero = substr($patente,4);
            $mixpatente = $primer.'-'.$segundo.'-'.$tercero;
            return $mixpatente;
        }
        
        public function saberEstado($estado) {
            
            switch ($estado) {
                case 0:
                    return "EN VENTA";
                    break;
                case 1:
                    return "EN USO";
                    break;
                case 2:
                    return "VENDIDO";
                    break;
            }
        }
}