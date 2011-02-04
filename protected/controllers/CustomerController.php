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
		$customerForm = new Customer;
		$condtion = array();
		
		if(isset($_GET['Customer']['serviceIds'])){
			if(!empty($_GET['Customer']['serviceIds'])){
				$paramsService = implode(",",$_GET['Customer']['serviceIds']);
				$condtion[] = "services.service_id = ";
			}
		}
		$serviceList = CHtml::listData(Service::model()->findAll(),'id','name');
		$this->render('index',array(
			'dataProvider' => Customer::model()->search(),
			'serviceList'=>$serviceList,
			'customerForm'=>$customerForm,
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
	
	public function actionDelete()
	{
		if(isset($_GET['id'])){
			$customer = Customer::model()->findbyPk($_GET['id']);
			$customer->delete();
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

