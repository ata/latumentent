<?php 
class BalanceController extends Controller
{
	public function actionIndex()
	{
	
		
		$revenue = Revenue::model()->findByPeriod(Period::model()->getLastId());
		$cost = Cost::model()->findByPeriod(Period::model()->getLastId());
		
		
		$period = new Period('search');

		$periodList = CHtml::listData(Period::model()->desc()->findAll(),'id','name');
		
		$this->render('index',array(
			'revenue'=>$revenue,
			'cost'=>$cost,
			'period'=>$period,
			'periodList'=>$periodList,
		));
	}
	
	public function actionFilter()
	{
		
		if(isset($_GET['period_id'])){
			$period_id = $_GET['period_id'];
		} else {
			$period_id = Period::model()->getLastId();
		}
		
		$revenue = Revenue::model()->findByPeriod($period_id);
		$cost = Cost::model()->findByPeriod($period_id);
		
		$this->renderPartial('_data',array(
			'revenue'=>$revenue,
			'cost'=>$cost,
		));
	}
}

