<?php

Yii::import('application.models._base.BaseVehiculos');

class Vehiculos extends BaseVehiculos
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}