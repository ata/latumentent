<?php

class ServiceController extends AdminController
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
				'actions'=>array('index','view','delete','create','update'),
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
			'service'=>$this->loadService($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$service=new Service;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($service);

		if(isset($_POST['Service']))
		{
			$service->attributes=$_POST['Service'];
			if($service->save())
				$this->redirect(array('view','id'=>$service->id));
		}

		$this->render('create',array(
			'service'=>$service,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$service=$this->loadService($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($service);

		if(isset($_POST['Service']))
		{
			$service->attributes=$_POST['Service'];
			if($service->save())
				$this->redirect(array('view','id'=>$service->id));
		}

		$this->render('update',array(
			'service'=>$service,
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
			$this->loadService($id)->delete();

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
		$service=new Service('search');
		$service->unsetAttributes();  // clear any default values
		if(isset($_GET['Service']))
			$service->attributes=$_GET['Service'];

		$this->render('index',array(
			'service'=>$service,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadService($id)
	{
		$service=Service::model()->findByPk((int)$id);
		if($service===null)
			throw new CHttpException(404,Yii::t('app','The requested page does not exist.'));
		return $service;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($service)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='service-form')
		{
			echo CActiveForm::validate($service);
			Yii::app()->end();
		}
	}
}
