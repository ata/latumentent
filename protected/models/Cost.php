<?php

/**
 * This is the model class for table "cost".
 *
 * The followings are the available columns in table 'cost':
 * @property integer $id
 * @property double $amount
 * @property integer $period_id
 * @property integer $service_id
 * @property integer $customer_id
 * @property text $note
 * @property integer $status
 */
class Cost extends ActiveRecord
{
	
	const STATUS_NOT_PAID = 0;
	const STATUS_PAID = 1;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Outlay the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cost';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('amount, period_id', 'required'),
			array('period_id, service_id, status, customer_id, user_id', 'numerical', 'integerOnly'=>true),
			array('amount', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, amount, period_id, service_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'service' => array(self::BELONGS_TO,'Service','service_id'),
			'period' => array(self::BELONGS_TO,'Period','period_id'),
			'customer' => array(self::BELONGS_TO,'Customer','customer_id'),
			'user' => array(self::BELONGS_TO,'User','user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app','ID'),
			'amount' => Yii::t('app','Amount'),
			'period_id' => Yii::t('app','Period'),
			'service_id' => Yii::t('app','Service'),
			'customer_id' => Yii::t('app','Customer')
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('period_id',$this->period_id);
		$criteria->compare('service_id',$this->service_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	public function getDisplay()
	{
		return Yii::t('app','{amount} at period {period} on {service}',array(
			'{amount}' => $this->amount,
			'{period}' => $this->period,
			'{service}' => $this->service,
		)); 
	}
	
	protected function beforeSave()
	{
		$this->user_id = $this->customer->user->id;
		return parent::beforeSave();
	}
	

	public function findByPeriod($period_id=false)
	{
		$criteria = new CDbCriteria;
		
		if($period_id !== 0){
			$period = $period_id;
		} else {
			$period = Period::model()->last()->last()->find()->id;
		}
		
		$criteria->group = 'service_id';
		$criteria->condition = 'period_id = :period';
		$criteria->params = array('period'=>$period);
		
		return $this->findAll($criteria);
		
	}
	
	public function getTotalCost()
	{
		return array_sum(CHtml::listData($this->findByPeriod(),'id','amount'));
	}
	
	public function getTotalCostLocale()
	{
		return Yii::app()->locale->numberFormatter->formatCurrency($this->totalCost,'IDR');
	}
	
	
	public function findAllCustomerCostByPeriodId($period_id) 
	{
		return $this->findAll('customer_id != NULL AND period_id = :period_id',array(
			'period_id' => $period_id,
		));
	}
	
	public function totalCustomerCostByPeriodId($period_id) 
	{
		return array_sum(CHtml::listData($this->findAllCustomerCostByPeriodId($period_id),'id','amount'));
	}

}

