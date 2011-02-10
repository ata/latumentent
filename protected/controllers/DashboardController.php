<?php

class DashboardController extends Controller
{
	
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
				'actions'=>array('index','management','customer_services'),
				'roles'=>array('admin','management','customer_services'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','customer'),
				'roles'=>array('customer'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionIndex()
	{
		if (Yii::app()->user->role == 'customer') {
			$this->redirect(array('customer'));
		}
		$periodListJSON = CJSON::encode(array_values(CHtml::listData(Period::model()->findAll(),'id','name')));
		$arpuListJSON = '[' . implode(',',CHtml::listData(StatisticArpu::model()->findAll(),'id','value')) . ']';
		$clientListJSON = '[' . implode(',',CHtml::listData(StatisticClient::model()->findAll(),'id','value')) . ']';
		$costClientListJSON = '[' . implode(',',CHtml::listData(StatisticCostClient::model()->findAll(),'id','value')) . ']';
		
		$this->render('index',array(
			'periodListJSON' => $periodListJSON,
			'arpuListJSON' => $arpuListJSON,
			'clientListJSON' => $clientListJSON,
			'costClientListJSON' => $costClientListJSON,
		));
	}

	public function actionManagement()
	{
		$this->render('management');
	}

	public function actionTechnical_support()
	{
		$this->render('technical_support');
	}
	
	public function actionCustomer_services()
	{
		$this->render('customer_services');
	}
	
	public function actionCustomer()
	{
		$invoice = Invoice::model()->findByUserId(Yii::app()->user->id);
		$this->render('customer',array(
			'invoice' => $invoice,
		));
	}
}
