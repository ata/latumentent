<?php

class RevenueController extends Controller
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
				'actions'=>array('index','view','create','update','filter','cancel'),
				'roles'=>array('admin','management','customer_services'),
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
			'revenue'=>$this->loadRevenue($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$revenue=new Revenue;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($revenue);

		if(isset($_POST['Revenue']))
		{
			$revenue->attributes=$_POST['Revenue'];
			if($revenue->save())
				$this->redirect(array('view','id'=>$revenue->id));
		} else {
			$revenue->period_id = Period::model()->last()->find()->id;
		}
		
		$serviceList = CHtml::listData(Service::model()->findAll(),'id','name');
		$periodList = CHtml::listData(Period::model()->desc()->findAll(),'id','name');

		$this->render('create',array(
			'revenue'=>$revenue,
			'serviceList'=>$serviceList,
			'periodList'=>$periodList,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$revenue=$this->loadRevenue($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($revenue);

		if(isset($_POST['Revenue']))
		{
			$revenue->attributes=$_POST['Revenue'];
			if($revenue->save())
				$this->redirect(array('view','id'=>$revenue->id));
		}
		
		$serviceList = CHtml::listData(Service::model()->findAll(),'id','name');
		$periodList = CHtml::listData(Period::model()->desc()->findAll(),'id','name');

		$this->render('update',array(
			'revenue'=>$revenue,
			'serviceList'=>$serviceList,
			'periodList'=>$periodList,
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
			$this->loadRevenue($id)->cancel();

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
		$revenue=new Revenue('search');
		$revenue->unsetAttributes(); 
		 // clear any default values
		if(isset($_GET['Revenue'])){
			$revenue->attributes=$_GET['Revenue'];
		} else {
			$revenue->period_id = Period::model()->getLastId();
		}
		
		
		$periodList = CHtml::listData(Period::model()->desc()->findAll(),'id','name');
		$totalRevenue = Revenue::model()->totalRevenueByPeriodIdLocale(Period::model()->lastId);
		$this->render('index',array(
			'revenue'=>$revenue,
			'periodList'=>$periodList,
			'totalRevenue'=>$totalRevenue,
		));
	}
	
	public function actionFilter()
	{
		if(isset($_POST['period_id'])){
			$period_id = $_POST['period_id'];
		} 
		
		$totalRevenue = Revenue::model()->totalRevenueByPeriodIdLocale($period_id);
		
		$this->renderPartial('_total',array(
			'totalRevenue'=>$totalRevenue,
		));
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadRevenue($id)
	{
		$revenue=Revenue::model()->findByPk((int)$id);
		if($revenue===null)
			throw new CHttpException(404,Yii::t('app','The requested page does not exist.'));
		return $revenue;
	}
	
	

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($revenue)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='revenue-form')
		{
			echo CActiveForm::validate($revenue);
			Yii::app()->end();
		}
	}
}
