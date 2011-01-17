<?php

class WebUser extends CWebUser
{

	public function login($identity,$duration=0)
	{
		$this->setRole($identity);
		parent::login($identity,$duration);
	}
	
	
	public function setRole($identity)
	{
		$this->setState('__role',$identity->role);
	}
	
	public function getRole()
	{
		return $this->getState('__role');
	}
	/*
	public function setUserIdentity($identity)
	{
		$this->setState('__userIdentity',$identity);
	}

	public function getUserIdentity()
	{
		return $this->getState('__userIdentity');
	}
	
	public function getReturnUrl()
	{
		return $this->getState('__returnUrl',Yii::app()->createUrl('/dashboard/default/index'));
	}
	*/

}
