<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class CustomerController extends Controller
{
	
	private $_model;
	
	public function actionIndex()
	{
		$customerFilter = new Customer;
		$condition = array();
		$condition[] = 'status=1';
		
		if(isset($_GET['Customer']['serviceIds'])){
			if(!empty($_GET['Customer']['serviceIds'])){
				$params_service = implode(",",$_GET['Customer']['serviceIds']);
				$condition[] = "services_services.service_id in ($params_service)"; 
			}
		}
		
		$criteria = new CDbCriteria;
		
		$dataProvider = new CActiveDataProvider('Customer',array(
			'criteria'=>$criteria,
		));
		
		$serviceList = CHtml::listData(Service::model()->findAll(),'id','name');
		$this->render('index',array(
			'dataProvider' => $dataProvider,
			'serviceList'=>$serviceList,
			'customerFilter'=>$customerFilter,
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
				if($customer->update() && $customer->user->update()){
					$this->redirect(array('index'));
				}
				
			}
			
			$this->render('update',array(
				'customer'=>$customer,
				'serviceList'=>$serviceList,
			));
		}
	}
	
	public function actionCreate()
	{
	    $serviceList = CHtml::listData(Service::model()->findAll(),'id','name');
		$customerForm=new CustomerForm;
		

		if(isset($_POST['ajax']) && $_POST['ajax']==='customer-form')
		{
			echo CActiveForm::validate($customerForm);
			Yii::app()->end();
		}

		if(isset($_POST['CustomerForm']))
		{
			$customerForm->attributes=$_POST['CustomerForm'];
			if ($customerForm->submit()) {
				$this->redirect(array('invoice/index'));
			}
		} else {
			$customerForm->serviceIds = array_keys($serviceList);
		}
		$this->render('create',array(
			'customerForm' => $customerForm,
			'serviceList' => $serviceList,
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
		if ($this->_model === null) {
            if (isset($_GET['id'])) {
                $this->_model = Customer::model()->findbyPk($_GET['id']);
            }
            if ($this->_model === null) {
                throw new CHttpException(404,'The requested page does not exist.');
            }
        }
        return $this->_model;
	}


}

