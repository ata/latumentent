<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class CustomerController extends Controller
{
	public function actionIndex()
	{
		$criteria = new CDbCriteria;
		$criteria->with = "user";
		$criteria->condition = "user.status=1";

		$customer = new CActiveDataProvider("Customer");
		$customer->criteria = $criteria;
		
		$this->render('index',array(
			'customer'=>$customer,
		));
	}

<<<<<<< HEAD
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
					if($customer->save()){
					$this->redirect(array('index'));
					}
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
		if(isset($_POST['User'])){
			$customer->user->attributes = $_POST['User'];
			if($customer->user->update()){
				$customer->attributes = $_POST['Customer'];
				if($customer->update()){
					$this->redirect(array('index'));
				}
			}
		}
		$this->render('update',array(
			'customer'=>$customer,
			'services'=>$services,
		));
	}

	public function actionDelete()
	{
		$customer = Customer::model()->findByPk($_GET['id']);
		$customer->user->softDelete();
	}

	public function actionDetailInvoice()
	{
		$this->render('detail');
	}

}

