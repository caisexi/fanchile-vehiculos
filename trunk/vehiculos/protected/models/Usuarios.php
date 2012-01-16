<?php

Yii::import('application.models._base.BaseUsuarios');

class Usuarios extends BaseUsuarios
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}