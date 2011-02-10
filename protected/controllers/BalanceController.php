<?php 
class BalanceController extends Controller
{
	public function actionIndex()
	{
	
		if(isset($_GET['period'])){
			$period = $_GET['period'];
		} else {
			$period = 0;
		}
		$revenue = Revenue::model()->findByPeriod($period);
		$cost = Cost::model()->findByPeriod($period);
		
		var_dump($revenue);
		
		$period = new Period;
		$period->unsetAttributes();
		$period->last()->find()->id;
		$periodList = CHtml::listData(Period::model()->findAll(),'id','name');
		
		$this->render('index',array(
			'revenue'=>$revenue,
			'cost'=>$cost,
			'period'=>$period,
			'periodList'=>$periodList,
		));
	}
	
	public function actionFilter()
	{
		
		if(isset($_GET['period'])){
			$period = $_GET['period'];
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

