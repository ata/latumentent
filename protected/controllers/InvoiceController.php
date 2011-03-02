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
				'actions'=>array('index','view','pay','filter'),
				'roles'=>array('admin','management','customer_services'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('view'),
				'roles'=>array('customer'),
			),
			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{
		
		$serviceList = CHtml::listData(Service::model()->findAll(),'id','name');
		$periodList = CHtml::listData(Period::model()->desc()->findAll(),'id','name');
		
		$invoice = new Invoice('search');
		$invoice->unsetAttributes();
		
		$period_id = Period::model()->getLastPeriodId();
		if (isset($_GET['Invoice'])) {
			$invoice->attributes = $_GET['Invoice'];
		} else {
			$invoice->serviceIds = array_keys($serviceList);
			$invoice->period_id = $period_id;
		}
		
		$totalBill = Invoice::model()->getTotalBills($period_id);
		$totalPaidBill = Invoice::model()->getTotalPaidBills($period_id);
		$totalNotPaidBill = Invoice::model()->getTotalNotPaidBills($period_id);
		
		
		$this->render('index',array(
			'invoice' => $invoice,
			'serviceList' => $serviceList,
			'periodList' => $periodList,
			'totalBill'=>$totalBill,
			'totalPaidBill'=>$totalPaidBill,
			'totalNotPaidBill'=>$totalNotPaidBill,
		));
	}
	
	public function actionFilter()
	{
		if(isset($_POST['period_id'])){
			$period_id = $_POST['period_id'];
		} else {
			$period_id = Period::model()->last()->find()->id;
		}
		
		$totalBill = Invoice::model()->getTotalBills($period_id);
		$totalPaidBill = Invoice::model()->getTotalPaidBills($period_id);
		$totalNotPaidBill = Invoice::model()->getTotalNotPaidBills($period_id);
		
		$this->renderPartial('_total',array(
			'totalBill'=>$totalBill,
			'totalPaidBill'=>$totalPaidBill,
			'totalNotPaidBill'=>$totalNotPaidBill,
		),false,true);
	}

	public function actionView()
	{
		$this->render('view',array(
			'invoice' => $this->loadInvoice(),
		));
	}
	
	
	public function actionPay()
	{
		$invoice = $this->loadInvoice();
		if (isset($_POST['Invoice'])) {
			$invoice->attributes = $_POST['Invoice'];
			if ($invoice->pay(Yii::app()->user->id)) {
				$this->redirect(array('index'));
			}
		}
		$paymentMethodList = CHtml::listData(PaymentMethod::model()->findAll(),'id','display');
		
		$this->render('pay',array(
			'paymentMethodList' => $paymentMethodList,
			'invoice' => $this->loadInvoice(),
		));
	}
	
	
	public function loadInvoice()
	{
		if ('customer' === Yii::app()->user->role) {
			$invoice = Invoice::model()->findByUserId(Yii::app()->user->id);
		} else {
			$invoice = Invoice::model()->findByPk((int) $_GET['id']);
		}
		if($invoice===null)
			throw new CHttpException(404,Yii::t('app','The requested page does not exist.'));
		return $invoice;
	}


}
