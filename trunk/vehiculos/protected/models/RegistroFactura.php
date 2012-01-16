<?php

Yii::import('application.models._base.BaseRegistroFactura');

class RegistroFactura extends BaseRegistroFactura
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}