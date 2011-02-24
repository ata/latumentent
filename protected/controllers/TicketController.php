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
				'roles'=>array('admin','management','technical_support','customer_services','customer'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('view'),
				'roles'=>array('admin','management','technical_support','customer'),
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
		$ticket = new Ticket('search');
		$ticket->unsetAttributes();
		if (isset($_GET['Ticket'])) {
			$ticket->attributes = $_GET['Ticket'];
		} else {
			$ticket->period_id = Period::model()->getLastId();
		}
		if (Yii::app()->user->role === 'customer') {
			$ticket->author_id = Yii::app()->user->id;
		}
		$periodList = CHtml::listData(Period::model()->desc()->findAll(),'id','name');
		$this->render('index',array(
			'ticket'=>$ticket,
			'periodList'=>$periodList,
		));
	}

	public function actionCreate()
	{
		$ticket = new Ticket();
		$ticket->author_id = Yii::app()->user->id;

		// uncomment the following code to enable ajax-based validation
		
		if (isset($_POST['ajax']) && $_POST['ajax']==='ticket-form') {
			echo CActiveForm::validate($ticket);
			Yii::app()->end();
		}
		if (isset($_POST['Ticket'])) {
			$ticket->attributes=$_POST['Ticket'];
			if($ticket->save()) {
				if (Yii::app()->user->role == 'customer') {
					$this->redirect(array('dashboard/customer'));
				}
				$this->redirect(array('invoice/view'));
			}
		}
		$invoiceItemList = CHtml::listData(InvoiceItem::model()
				->findAllCurrentPeriod(Yii::app()->user->id),'id','service.name');
		$problemTypeList = CHtml::listData(ProblemType::model()->findAll(),'id','display');
		$serviceList = CHtml::listData(Service::model()->findAll(),'id','name');
		
		
		
		$this->render('create',array(
			'ticket'=>$ticket,
			'invoiceItemList' => $invoiceItemList,
			'problemTypeList' => $problemTypeList,
			'serviceList' => $serviceList,
		));

	}
	
	public function actionView()
	{
		$ticket = $this->loadTicket();
		$reply = new TicketReply;
		
		if (isset($_POST['Ticket'])) {
			$ticket->attributes = $_POST['Ticket'];
			if($ticket->save()) {
				
			}
		}
		if (isset($_POST['submit'])) {
			if (isset($_POST['submit']['close'])) {
				if ($ticket->close(Yii::app()->user->id)) {
					$reply->attributes = array();
					$this->refresh();
				}
			} else if (isset($_POST['submit']['reply']) || isset($_POST['submit']['reply_close'])){
				$reply->attributes = $_POST['TicketReply'];
				if ($ticket->reply(Yii::app()->user->id, $reply)) {
					$reply->attributes = array();
				}
				if (isset($_POST['submit']['reply_close'])) {
					if($ticket->close(Yii::app()->user->id)) {
						$reply->attributes = array();
					}
				}
				$this->refresh();
			} else if (isset($_POST['submit']['open'])) {
				if ($ticket->open(Yii::app()->user->id)) {
					$this->refresh();
				}
			}
		}
		
		$this->render('view',array(
			'ticket' => $ticket,
			'reply' => $reply,
		));
	}


	
	public function loadTicket()
	{
		if (!isset($_GET['id'])) {
			throw new CHttpException(404,Yii::t('app','The requested page does not exist.'));
		}
		$ticket = Ticket::model()->findByPk((int) $_GET['id']);
		
		if ($ticket === null) {
			throw new CHttpException(404,Yii::t('app','The requested page does not exist.'));
		}
		return $ticket;
	}
}

