<?php

Yii::import('application.models._base.BasePersonal');

class Personal extends BasePersonal
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}