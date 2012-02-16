<?php

Yii::import('application.models._base.BaseDiesel');

class Diesel extends BaseDiesel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}