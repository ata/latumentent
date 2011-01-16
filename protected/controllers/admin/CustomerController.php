<?php

class CustomerController extends AdminController
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
			'customer'=>$this->loadCustomer($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$customer=new Customer;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($customer);

		if(isset($_POST['Customer']))
		{
			$customer->attributes=$_POST['Customer'];
			if($customer->save())
				$this->redirect(array('view','id'=>$customer->id));
		}

		$this->render('create',array(
			'customer'=>$customer,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$customer=$this->loadCustomer($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($customer);

		if(isset($_POST['Customer']))
		{
			$customer->attributes=$_POST['Customer'];
			if($customer->save())
				$this->redirect(array('view','id'=>$customer->id));
		}

		$this->render('update',array(
			'customer'=>$customer,
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
			$this->loadCustomer($id)->delete();

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
		$customer=new Customer('search');
		$customer->unsetAttributes();  // clear any default values
		if(isset($_GET['Customer']))
			$customer->attributes=$_GET['Customer'];

		$this->render('index',array(
			'customer'=>$customer,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadCustomer($id)
	{
		$customer=Customer::model()->findByPk((int)$id);
		if($customer===null)
			throw new CHttpException(404,Yii::t('app','The requested page does not exist.'));
		return $customer;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($customer)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='customer-form')
		{
			echo CActiveForm::validate($customer);
			Yii::app()->end();
		}
	}
}
