<?php

class WebUser extends CWebUser
{

	public function login($identity,$duration=0)
	{
		$this->setRole($identity);
		$this->setFullname($identity);
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
	
	public function setFullname($identity)
	{
		$this->setState('__fullname',$identity->fullname);
	}
	
	public function getFullname()
	{
		return $this->getState('__fullname');
	}
	
	/**
	 * @override
	 */
	public function checkAccess($operation,$params=array(),$allowCaching=true)
	{
		if ($operation === $this->role) {
			return true;
		}
		return false;
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
	*/
	
	public function getReturnUrl($defaultUrl=null)
	{
		return $this->getState('__returnUrl',Yii::app()->createUrl('site/dashboard'));
	}


}
