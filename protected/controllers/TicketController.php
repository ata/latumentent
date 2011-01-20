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
		$this->render('create');
	}

	public function actionReply()
	{
		$this->render('reply');
	}
}

