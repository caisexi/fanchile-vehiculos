<?php

Yii::import('application.models._base.BasePresupuesto');

class Presupuesto extends BasePresupuesto
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}