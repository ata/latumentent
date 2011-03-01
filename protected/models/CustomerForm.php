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
	public $service_package_id;
	public $contact_number;
	public $ownership;
	public $hire_up_to;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('fullname, contact_number, hire_up_to, ownership, username, password, apartmentNumber, confirmPassword, service_package_id', 'required'),
			array('confirmPassword', 'compare', 'compareAttribute'=>'password'),
			array('username', 'unique', 'className' => 'User'),
			array('apartmentNumber', 'exist', 'className' => 'Apartment', 'attributeName' => 'number'),
			// email has to be a valid email address
			array('email', 'email'),
			array('servicesIds, hire_up_to','safe'),
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
			'service_package_id' => Yii::t('app','Service Package'),
			'contact_number' => Yii::t('app','Contact Number'),
			'hire_up_to' => Yii::t('app','Hire Up To'),
			'ownership' => Yii::t('app','Apartment Ownership'),
		);
	}
	
	protected function afterValidate()
	{
		if ($this->ownership == Customer::OWNERSHIP_OWNER) {
			$this->clearErrors('hire_up_to');
		}
		return parent::afterValidate();
	}
	
	public function submit()
	{
		$transaction = Yii::app()->db->beginTransaction();
		if (!$this->validate()) {
			return false;
		}
		$user = new User;
		$user->fullname = $this->fullname;
		$user->username = $this->username;
		$user->password = $this->password;
		$user->role_id = Role::model()->findByName('customer')->id;
		$user->email = $this->email;
		
		if (!$user->save()) {
			var_dump($user->errors);
			die();
			return false;
		}
		
		$customer = new Customer;
		$customer->user_id = $user->id;
		$customer->apartment_id = Apartment::model()->findByNumber($this->apartmentNumber)->id;
		$customer->service_package_id = $this->service_package_id;
		$customer->contact_number = $this->contact_number;
		$customer->ownership = $this->ownership;
		$customer->hire_up_to = $this->hire_up_to;
		
		if (!$customer->save()) {
			var_dump($customer->errors);
			die();
			return false;
		}
		/*
		if(!$customer->generateInvoices(Period::model()->lastId)) {
			return false;
		}
		*/
		
		Revenue::model()->createRegisterRevenue($customer);
		
		$transaction->commit();
		return true;
	}
}
