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
		if (property_exists($this, 'display')) {
			return $this->display;
		}
		if (property_exists($this, 'name')) {
			return $this->name;
		}
		return sprintf('%s ID: %s',get_class($this), $this->id);
	}
	
	public function __toString()
	{
		return $this->getDisplay();
	}
}
