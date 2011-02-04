<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class CustomerController extends Controller
{
	public function actionIndex()
	{
		$this->render('index',array(
			'dataProvider' => Customer::model()->search(),
		));
	}
	
	
	public function actionTest()
	{
		if($test === new Customer){
			echo $test;
		}
		$this->render('index');
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


}

