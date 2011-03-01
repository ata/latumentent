<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class CustomerController extends Controller
{
	
	
	private $_customer;
	
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','create','update','resetPassword','softDelete'),
				'roles'=>array('admin','management','customer_services'),
			),
			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	
	
	public function actionIndex()
	{
		$serviceList = CHtml::listData(Service::model()->findAll(),'id','name');
		$customer = new Customer('search');
		$customer->unsetAttributes();
		if (isset($_GET['Customer'])) {
			$customer->attributes = $_GET['Customer'];
		} else {
			$customer->serviceIds = array_keys($serviceList);
		}
		
		$this->render('index',array(
			'serviceList'=>$serviceList,
			'customer'=>$customer,
			'servicePackageList' => CHtml::listData(ServicePackage::model()->findAll(),'id','display'),
		));
	}
	
	
	public function actionSoftDelete()
	{
		if(isset($_GET['id'])){
			$customer = Customer::model()->findByPk($_GET['id']);
			$customer->userCustomerSoftDelete();
		}
	}
	
	public function actionUpdate()
	{
		$serviceList = CHtml::listData(Service::model()->findAll(),'id','name');
		
		if(isset($_GET['id'])){
			$customer = Customer::model()->findByPk($_GET['id']);
			if(isset($_POST['Customer']) && isset($_POST['User'])){
				$customer->attributes = $_POST['Customer'];
				$customer->user->attributes = $_POST['User'];
				if($customer->save() && $customer->user->save()){
					$this->redirect(array('index'));
				}
				
			}
			
			$this->render('update',array(
				'customer'=>$customer,
				'serviceList'=>$serviceList,
				'servicePackageList' => CHtml::listData(ServicePackage::model()->findAll(),'id','display'),
			));
		}
	}
	
	public function actionCreate()
	{
		$serviceList = CHtml::listData(Service::model()->findAll(),'id','name');
		$customerForm = new CustomerForm;
		

		if(isset($_POST['ajax']) && $_POST['ajax']==='customer-form'){
			echo CActiveForm::validate($customerForm);
			Yii::app()->end();
		}

		if(isset($_POST['CustomerForm'])) {
			$customerForm->attributes=$_POST['CustomerForm'];
			if ($customerForm->validate() && $customerForm->submit()) {
				$this->redirect(array('index'));
			}
		} 
		$this->render('create',array(
			'customerForm' => $customerForm,
			'serviceList' => $serviceList,
			'servicePackageList' => CHtml::listData(ServicePackage::model()->findAll(),'id','display'),
		));
	}
	
	public function actionResetPassword()
	{
		if(isset($_GET['id'])){
			$customer = Customer::model()->findByPk($_GET['id']);
			$user = User::model()->findByPk($customer->user_id);
			
			if(isset($_POST['User'])){
				$user->attributes = $_POST['User'];
				//var_dump($user->attributes);
				$user->reqNewPassword = true;
				if($user->save()){
					 Yii::app()->user->setFlash('message',Yii::t('app',
						'Password has been reset'));
					$this->redirect(array('index'));
				}
			}
			
			$this->render('resetPassword',array(
				'user'=>$user,
			));
		}
		
	}
	
	public function loadCustomer()
	{
		if ($this->_customer === null) {
			if (isset($_GET['id'])) {
				$this->_customer = Customer::model()->findbyPk($_GET['id']);
			}
			if ($this->_customer === null) {
				throw new CHttpException(404,'The requested page does not exist.');
			}
		}
		return $this->_customer; 
	}


}

