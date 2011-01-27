<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class TicketController extends Controller
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
				'actions'=>array('index'),
				'roles'=>array('admin','technical_support'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('view'),
				'roles'=>array('admin','technical_support'),
			),
			
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('create'),
				'roles'=>array('admin','customer'),
			),
			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionCreate()
	{
		$ticket = new Ticket;
		$ticket->author_id = Yii::app()->user->id;

		// uncomment the following code to enable ajax-based validation
		
		if (isset($_POST['ajax']) && $_POST['ajax']==='ticket-form') {
			echo CActiveForm::validate($ticket);
			Yii::app()->end();
		}
		if (isset($_POST['Ticket'])) {
			$ticket->attributes=$_POST['Ticket'];
			if($ticket->save()) {
				$this->redirect(array('invoice/view'));
			}
		}
		$invoiceItemList = CHtml::listData(InvoiceItem::model()
				->findAllCurrentPeriod(Yii::app()->user->id),'id','service.name');
				
		$this->render('create',array(
			'ticket'=>$ticket,
			'invoiceItemList' => $invoiceItemList,
		));

	}
	
	public function actionView()
	{
		$this->render('view');
	}

	public function actionReply()
	{
		$this->render('reply');
	}
}

