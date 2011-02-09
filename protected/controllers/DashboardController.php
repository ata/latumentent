<?php

class DashboardController extends Controller
{
	public function actionIndex()
	{
		if (Yii::app()->user->role == 'customer') {
			$this->redirect(array('customer'));
		}
		$this->render('index');
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
