<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class CustomerController extends Controller
{
	public function actionIndex()
	{
		$customer = new Customer('search');
	
	$this->render('index',array(
		'customer'=>$customer,
	));
	}

	public function actionCreate()
	{
	
	$customer = new Customer;
	if($customer->user === null){
		$customer->user = new User;
	}

	if(isset($_POST['User'])){
		$customer->user->attributes = $_POST['User'];
		$customer->user->role_id = '2';
		if($customer->user->save()){
		if(isset($_POST['Customer'])){
			$customer->attributes = $_POST['Customer'];
			$customer->user_id = Yii::app()->db->getLastInsertId();
			$customer->save();
			//var_dump($customer->attributes);
		}
		}
	}
	$services = CHtml::listData(Service::model()->findAll(),'id','name');
		$this->render('create',array(
			'customer'=>$customer,
			'services'=>$services,
		));
	}

	public function actionUpdate()
	{
		$customer = Customer::model()->findByPk($_GET['id']);
		$services = CHtml::listData(Service::model()->findAll(),'id','name');
		$this->render('update',array(
			'customer'=>$customer,
			'services'=>$services,
		));
	}


}

