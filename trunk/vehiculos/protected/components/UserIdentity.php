<?php

class UserIdentity extends CUserIdentity
{
    private $_id;
    public function authenticate()
    {
        $record=  Usuarios::model()->findByAttributes(array('usuario'=>$this->username));
        if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($record->contrasena!==md5(md5($this->password).Yii::app()->params["salt"]))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->_id=$record->id;
            $this->setState('title', $record->usuario);
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
 
    public function getId()
    {
        return $this->_id;
    }
}