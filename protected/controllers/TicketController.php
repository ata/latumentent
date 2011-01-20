<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class TicketController extends Controller
{

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionCreate()
	{
		$ticket=new Ticket;

		// uncomment the following code to enable ajax-based validation
		
		if(isset($_POST['ajax']) && $_POST['ajax']==='ticket-form')
		{
			echo CActiveForm::validate($ticket);
			Yii::app()->end();
		}
		

		if(isset($_POST['Ticket'])) {
			$ticket->attributes=$_POST['Ticket'];
			$ticket->save();
		}
		$invoiceItemList = CHtml::listData(InvoiceItem::model()
				->findAllCurrentPeriod(Yii::app()->user->id),'id','service.name');
		
		$this->render('create',array(
			'ticket'=>$ticket,
			'invoiceItemList' => $invoiceItemList,
		));

	}

	public function actionReply()
	{
		$this->render('reply');
	}
}

