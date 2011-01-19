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

    public function actionCustomerComplaint()
    {
	$this->render('customer_complaint');
    }

    public function actionReplyTicket()
    {
	$this->render('replyticket');
    }


}

