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
		/*$criteria->alias = 'Customer';
		$criteria->join = 'LEFT OUTER JOIN customer_has_service on customer_has_service.customer_id = Customer.id';
		$criteria->condition = 'Customer.status=1';*/
		
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
	
	
	public function actionTest()
	{
		if($test === new Customer){
			echo $test;
		}
		$this->render('index');
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
	
	/*public function actionDelete()
	{
		if(isset($_GET['id'])){
			$customer = Customer::model()->findbyPk($_GET['id']);
			$customer->delete();
		}
		
	}*/
	
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

