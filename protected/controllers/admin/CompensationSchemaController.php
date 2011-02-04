<?php

class CompensationSchemaController extends AdminController
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
			'compensationSchema'=>$this->loadCompensationSchema($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$compensationSchema=new CompensationSchema;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($compensationSchema);

		if(isset($_POST['CompensationSchema']))
		{
			$compensationSchema->attributes=$_POST['CompensationSchema'];
			if($compensationSchema->save())
				$this->redirect(array('view','id'=>$compensationSchema->id));
		}

		$this->render('create',array(
			'compensationSchema'=>$compensationSchema,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$compensationSchema=$this->loadCompensationSchema($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($compensationSchema);

		if(isset($_POST['CompensationSchema']))
		{
			$compensationSchema->attributes=$_POST['CompensationSchema'];
			if($compensationSchema->save())
				$this->redirect(array('view','id'=>$compensationSchema->id));
		}

		$this->render('update',array(
			'compensationSchema'=>$compensationSchema,
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
			$this->loadCompensationSchema($id)->delete();

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
		$compensationSchema=new CompensationSchema('search');
		$compensationSchema->unsetAttributes();  // clear any default values
		if(isset($_GET['CompensationSchema']))
			$compensationSchema->attributes=$_GET['CompensationSchema'];

		$this->render('index',array(
			'compensationSchema'=>$compensationSchema,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadCompensationSchema($id)
	{
		$compensationSchema=CompensationSchema::model()->findByPk((int)$id);
		if($compensationSchema===null)
			throw new CHttpException(404,Yii::t('app','The requested page does not exist.'));
		return $compensationSchema;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($compensationSchema)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='compensation-schema-form')
		{
			echo CActiveForm::validate($compensationSchema);
			Yii::app()->end();
		}
	}
}
