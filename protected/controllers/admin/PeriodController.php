<?php

class PeriodController extends AdminController
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
				'actions'=>array('index','view','delete','Open','create','update'),
				'users'=>array('admin'),
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
			'period'=>$this->loadPeriod($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$period=new Period;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($period);

		if(isset($_POST['Period']))
		{
			$period->attributes=$_POST['Period'];
			if($period->save())
				$this->redirect(array('view','id'=>$period->id));
		}

		$this->render('create',array(
			'period'=>$period,
		));
	}
	
	public function actionOpen()
	{
		$period = new Period;
		if (isset($_POST['Period'])) {
			//die($_POST['Period']['name']);
			Period::model()->open($_POST['Period']['name']);
			$this->redirect(array('index'));
		} else {
			$period->name = date('F Y');
		}
		$this->render('open',array(
			'period'=>$period,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$period=$this->loadPeriod($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($period);

		if(isset($_POST['Period']))
		{
			$period->attributes=$_POST['Period'];
			if($period->save())
				$this->redirect(array('view','id'=>$period->id));
		}

		$this->render('update',array(
			'period'=>$period,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadPeriod($id)->delete();

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
		$period=new Period('search');
		$period->unsetAttributes();  // clear any default values
		if(isset($_GET['Period']))
			$period->attributes=$_GET['Period'];

		$this->render('index',array(
			'period'=>$period,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadPeriod($id)
	{
		$period=Period::model()->findByPk((int)$id);
		if($period===null)
			throw new CHttpException(404,Yii::t('app','The requested page does not exist.'));
		return $period;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($period)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='period-form')
		{
			echo CActiveForm::validate($period);
			Yii::app()->end();
		}
	}
}
