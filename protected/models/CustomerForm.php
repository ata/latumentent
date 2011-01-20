<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class CustomerForm extends CFormModel
{
	public $fullname;
	public $email;
	public $username;
	public $password;
	public $confirmPassword;
	public $apartmentNumber;
	public $serviceIds = array();

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('fullname, username, password, confirmPassword', 'required'),
			array('confirmPassword', 'compare', 'compareAttribute'=>'password'),
			array('username', 'unique', 'className' => 'User'),
			// email has to be a valid email address
			array('email', 'email'),
			array('servicesIds','safe'),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'fullname' => Yii::t('app','Full Name'),
			'email' => Yii::t('app','Email'),
			'username' => Yii::t('app','Username'),
			'password' => Yii::t('app','Password'),
			'confirmPassword' => Yii::t('app','Confirm Password'),
			'email' => Yii::t('app','Email'),
			'apartmentNumber' => Yii::t('app','Apartment Number'),
		);
	}
	
	public function submit()
	{
		if (!$this->validate()) {
			return false;
		}
		
		
		
		return false;
	}
}
