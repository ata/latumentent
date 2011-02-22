<?php

class ActiveRecord extends CActiveRecord
{
	public function getUrl()
	{
		$route = strtolower(get_class($this)) . '/view';
		return Yii::app()->createUrl($route,array('id' => $this->id));
	}
	
	public function getDisplay()
	{
		if (isset($this->name)){
			return $this->name;
		}
		return sprintf('%s ID: %s',get_class($this), $this->id);
	}
	
	
	public function __toString()
	{
		return $this->getDisplay();
	}
	
	protected function beforeSave()
	{
		if (isset($this->user_log_id) && !Yii::app()->user->isGuest) {
			$this->user_log_id = Yii::app()->user->id;
		}
		return parent::beforeSave();
	}
}
