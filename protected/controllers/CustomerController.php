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
	
	
	public function actionCreate()
	{
		$customerForm=new CustomerForm;

		if(isset($_POST['ajax']) && $_POST['ajax']==='customer-form')
		{
			echo CActiveForm::validate($customerForm);
			Yii::app()->end();
		}

		if(isset($_POST['CustomerForm']))
		{
			$customerForm->attributes=$_POST['CustomerForm'];
			if($customerForm->validate())
			{
				// form inputs are valid, do something here
				return;
			}
		}
		$this->render('create',array('customerForm'=>$customerForm));
	}


}

