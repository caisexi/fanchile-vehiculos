<?php

/**
 * This is the model base class for the table "usuarios".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Usuarios".
 *
 * Columns in table "usuarios" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property string $usuario
 * @property string $contrasena
 * @property string $creado
 * @property string $modificado
 *
 */
abstract class BaseUsuarios extends GxActiveRecord {
    
        public $nueva_contrasena;
        public $contrasena2;
        
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'usuarios';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Usuario|Usuarios', $n);
	}

	public static function representingColumn() {
		return 'usuario';
	}

	public function rules() {
		return array(
			array('usuario, creado, modificado', 'required'),
			array('usuario, contrasena', 'length', 'max'=>32),
                        array('nueva_contrasena','length','min'=>3,'max'=>16,'allowEmpty'=>false,'on'=>'insert'),
                        array('nueva_contrasena','length','min'=>3,'max'=>16,'allowEmpty'=>true,'on'=>'update'),
                        array('nueva_contrasena', 'compare', 'compareAttribute'=>'contrasena2'), 
                        array('contrasena , contrasena2', 'safe'),
			array('usuario, creado, modificado', 'safe', 'on'=>'search'),
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
			'usuario' => Yii::t('app', 'Usuario'),
			'contrasena' => Yii::t('app', 'Contrasena'),
			'creado' => Yii::t('app', 'Creado'),
			'modificado' => Yii::t('app', 'Modificado'),
                        'nueva_contrasena'=>'Contraseña',
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('usuario', $this->usuario, true);
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
        
        public function beforeSave() {
            if (!empty($this->nueva_contrasena))
                    $this->contrasena = md5(md5($this->nueva_contrasena).Yii::app()->params["salt"]);
            return true;
        }
}