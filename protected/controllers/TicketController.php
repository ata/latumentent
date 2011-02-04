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
				'roles'=>array('admin','technical_support','customer_services','customer'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('view'),
				'roles'=>array('admin','technical_support','customer'),
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
		//$filter = isset($_GET['period']) ? "author_id = :author_id AND period_id = '$_GET[period]'" : "author_id = :author_id" ;
		$ticketList = new Ticket;
		$condition = array();
		
		if(isset($_GET['Ticket']['period'])){
			$params_period = $_GET['Ticket']['period'];
			$condition[] = "period_id=$params_period";
		}
	
		if(isset($_GET['Ticket']['status'])){
			if(!empty($_GET['Ticket']['status'])){
				$params_status = implode(",",$_GET['Ticket']['status']);
				$condition[] = "status in ($params_status)";
			}	
		}
		
		if(Yii::app()->user->getRole() === 'customer'){
			$condition[] = "author_id = '".Yii::app()->user->id."'";
		}
		
		
		$criteria = new CDbCriteria;
		$criteria->condition = implode(" AND ",$condition);
		
		$dataProvider = new CActiveDataProvider('Ticket',array(
			'criteria'=>$criteria,
		));
		$periodList = CHtml::listData(Period::model()->findAll(),'id','name');
		$this->render('index',array(
			'ticketList'=>$ticketList,
			'periodList'=>$periodList,
			'dataProvider'=>$dataProvider,
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
		$ticket = $this->loadTicket();
		$reply = new TicketReply;
		
		if (isset($_POST['Ticket'])) {
			$ticket->attributes = $_POST['Ticket'];
			if($ticket->save()) {
				
			}
		}
		
		if (isset($_POST['submit'])) {
			if (isset($_POST['submit']['close'])) {
				if ($ticket->close()) {
					$reply->attributes = array();
					$this->refresh();
				}
			} else if (isset($_POST['submit']['reply']) || isset($_POST['submit']['reply_close'])){
				$reply->attributes = $_POST['TicketReply'];
				if ($ticket->reply(Yii::app()->user->id, $reply)) {
					$reply->attributes = array();
				}
				if (isset($_POST['submit']['reply_close'])) {
					if($ticket->close()) {
						$reply->attributes = array();
					}
				}
				$this->refresh();
			} else if (isset($_POST['submit']['open'])) {
				if ($ticket->open()) {
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

