<?php 
class BalanceController extends Controller
{
	public function actionIndex()
	{
	
		if(isset($_GET['filter'])){
			$period = $_GET['filter'];
		} else {
			$period = 0;
		}
		$revenue = Revenue::model()->findByPeriod($period);
		$cost = Cost::model()->findByPeriod($period);
		
		$period = new Period;
		$period->unsetAttributes();
		$period->id = Period::model()->last()->find()->id;
		$periodList = CHtml::listData(Period::model()->findAll(),'id','name');
		
		$this->render('index',array(
			'revenue'=>$revenue,
			'cost'=>$cost,
			'period'=>$period,
			'periodList'=>$periodList,
		));
	}
	
	public function actionUpdate()
	{
		
		if(isset($_GET['filter'])){
			$period = $_GET['filter'];
		} else {
			$period = 0;
		}
		
		$revenue = Revenue::model()->findByPeriod($period);
		$cost = Cost::model()->findByPeriod($period);
		
		$this->renderPartial('_data',array(
			'revenue'=>$revenue,
			'cost'=>$cost,
		),false,true);
	}
}

