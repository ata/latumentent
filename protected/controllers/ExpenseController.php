<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class ExpenseController extends Controller
{
    public function actionIndex()
    {
	$this->render('index');
    }

    public function actionAddExpense()
    {
	$this->render('add');
    }
}
?>
