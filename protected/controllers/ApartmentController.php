<?php

class ApartmentController extends Controller
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
				'roles'=>array('admin'),
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
			'apartment'=>$this->loadApartment($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$apartment=new Apartment;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($apartment);

		if(isset($_POST['Apartment']))
		{
			$apartment->attributes=$_POST['Apartment'];
			if($apartment->save())
				$this->redirect(array('view','id'=>$apartment->id));
		}

		$this->render('create',array(
			'apartment'=>$apartment,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$apartment=$this->loadApartment($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($apartment);

		if(isset($_POST['Apartment']))
		{
			$apartment->attributes=$_POST['Apartment'];
			if($apartment->save())
				$this->redirect(array('view','id'=>$apartment->id));
		}

		$this->render('update',array(
			'apartment'=>$apartment,
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
			$this->loadApartment($id)->delete();

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
		$apartment=new Apartment('search');
		$apartment->unsetAttributes();  // clear any default values
		if(isset($_GET['Apartment']))
			$apartment->attributes=$_GET['Apartment'];

		$this->render('index',array(
			'apartment'=>$apartment,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadApartment($id)
	{
		$apartment=Apartment::model()->findByPk((int)$id);
		if($apartment===null)
			throw new CHttpException(404,Yii::t('app','The requested page does not exist.'));
		return $apartment;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($apartment)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='apartment-form')
		{
			echo CActiveForm::validate($apartment);
			Yii::app()->end();
		}
	}
}
