<?php

class CostController extends Controller
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
				'actions'=>array('index','view','create','update','filter','cancel','pay'),
				'roles'=>array('admin','management','customer_service'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'cost'=>$this->loadCost($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$cost=new Cost;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($cost);

		if (isset($_POST['Cost'])) {
			$cost->attributes=$_POST['Cost'];
			if($cost->save())
				Period::model()->last()->find()->updateStatistics();
				$this->redirect(array('index'));
		} else {
			$cost->period_id = Period::model()->getLastId();
		}

		$this->render('create',array(
			'cost'=>$cost,
		));
	}
	
	
	
	public function actionFilter()
	{
		if(isset($_POST['period_id'])){
			$period_id = $_POST['period_id'];
		} else {
			$period_id = Period::model()->getLastId();
		}

		$totalCostNotPaid = Cost::model()->totalCostByPeriodNotPaidLocale($period_id);
		$totalCostPaid = Cost::model()->totalCostByPeriodPaidLocale($period_id);
		$totalCostAll = Cost::model()->totalCostByPeriodAllLocale(Period::model()->lastId);
		
		$this->renderPartial('_total',array(
			'totalCostNotPaid'=>$totalCostNotPaid,
			'totalCostPaid'=>$totalCostPaid,
			'totalCostAll'=>$totalCostAll,
			));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$cost=$this->loadCost($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($cost);

		if(isset($_POST['Cost']))
		{
			$cost->attributes=$_POST['Cost'];
			if($cost->save())
				$this->redirect(array('view','id'=>$cost->id));
		}

		$this->render('update',array(
			'cost'=>$cost,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionCancel($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadCost($id)->cancel();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,Yii::t('app','Invalid request. Please do not repeat this request again.'));
	}

	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$cost=new Cost('search');
		$cost->unsetAttributes();
		  // clear any default values
		if(isset($_GET['Cost'])){
			$cost->attributes=$_GET['Cost'];
		} else {
			$cost->period_id = Period::model()->getLastPeriodId();
		}
		
		
		
		$totalCostNotPaid = Cost::model()->totalCostByPeriodNotPaidLocale(Period::model()->lastId);
		$totalCostPaid = Cost::model()->totalCostByPeriodPaidLocale(Period::model()->lastId);
		$totalCostAll = Cost::model()->totalCostByPeriodAllLocale(Period::model()->lastId);
		
		$periodList = CHtml::listData(Period::model()->desc()->findAll(),'id','name');
		
		$this->render('index',array(
			'cost'=>$cost,
			'periodList'=>$periodList,
			'totalCostNotPaid'=>$totalCostNotPaid,
			'totalCostPaid'=>$totalCostPaid,
			'totalCostAll'=>$totalCostAll,
		));
	}
	
	public function actionPay($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadCost($id)->payCost(Yii::app()->user->id);

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,Yii::t('app','Invalid request. Please do not repeat this request again.'));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadCost($id)
	{
		$cost=Cost::model()->findByPk((int)$id);
		if($cost===null)
			throw new CHttpException(404,Yii::t('app','The requested page does not exist.'));
		return $cost;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($cost)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cost-form')
		{
			echo CActiveForm::validate($cost);
			Yii::app()->end();
		}
	}
}
