<?php

class InvoiceController extends Controller
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
				'actions'=>array('index','view'),
				'roles'=>array('admin','customer_services'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{
		
		$serviceList = CHtml::listData(Service::model()->findAll(),'id','name');
		$periodList = CHtml::listData(Period::model()->findAll(),'id','name');
		
		$invoice = new Invoice('search');
		$invoice->unsetAttributes();
		
		if (isset($_GET['Invoice'])) {
			$invoice->attributes = $_GET['Invoice'];
		} else {
			$invoice->serviceIds = array_keys($serviceList);
		}
		
		$this->render('index',array(
			'invoice' => $invoice,
			'serviceList' => $serviceList,
			'periodList' => $periodList,
		));
	}

	public function actionView()
	{
		$this->render('view',array(
			'invoice' => $this->loadInvoice(),
		));
	}
	
	
	public function loadInvoice()
	{
		$id = $_GET['id'];
		if(!isset($_GET['id'])) {
			$id = Yii::app()->user->id;
		}
		
		$invoice=Invoice::model()->findByPk((int) $id);
		if($invoice===null)
			throw new CHttpException(404,Yii::t('app','The requested page does not exist.'));
		return $invoice;
	}


}
