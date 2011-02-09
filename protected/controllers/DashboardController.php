<?php

class DashboardController extends Controller
{
	public function actionIndex()
	{
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
}
