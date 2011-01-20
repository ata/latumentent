<?php

class ActiveRecord extends CActiveRecord
{
	public function getUrl()
	{
		$route = strtolower(get_class($this)) . '/view';
		return Yii::app()->createUrl($route,array('id' => $this->id));
	}
}
