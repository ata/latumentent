<?php

/**
 * This is the model class for table "revenue".
 *
 * The followings are the available columns in table 'revenue':
 * @property integer $id
 * @popertty string $name
 * @property double $amount
 * @property integer $period_id
 * @property integer $service_id
 * @property integer $status
 * @property integer $user_log_id
 */
class Revenue extends ActiveRecord
{
	const STATUS_RECEIVED = 1;
	const STATUS_NOT_RECEIVED = 0;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Revenue the static model class
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
		return 'revenue';
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
			array('period_id, service_id, user_log_id, status, user_id, customer_id', 'numerical', 'integerOnly'=>true),
			array('amount', 'numerical'),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, amount, period_id, service_id,user_id,status', 'safe', 'on'=>'search'),
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
			'service'=>array(self::BELONGS_TO,'Service','service_id'),
			'period'=>array(self::BELONGS_TO,'Period','period_id'),
			'customer' => array(self::BELONGS_TO,'Customer','customer_id'),
			'user'=>array(self::BELONGS_TO,'User','user_id'),
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app','ID'),
			'name' => Yii::t('app','Name'),
			'amount' => Yii::t('app','Amount'),
			'period_id' => Yii::t('app','Period'),
			'service_id' => Yii::t('app','Service'),
			'user_id' => Yii::t('app','User'),
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

	
	protected function beforeSave()
	{
		if($this->customer !== null) {
			$this->user_id = $this->customer->user->id;
		}
		return parent::beforeSave();
	}
	
	
	public function createRegisterRevenue($customer)
	{
		$revenue = new Revenue;
		$revenue->period_id = Period::model()->getLastId();
		$revenue->user_id = $customer->user->id;
		$revenue->customer_id = $customer->id;
		$revenue->status = self::STATUS_RECEIVED;
		$revenue->amount = Setting::model()->get('REGISTER_FEE',200000);
		$revenue->name = Yii::t('app','Registration Fee from {name}',array(
			'{name}' => $customer->user->display,
		));
		if($revenue->save()) {
			return true;
		} else {
			var_dump($revenue->errors);
			die();
		}
		
	}

	public function findByPeriod($period_id)
	{
		
		$criteria = new CDbCriteria;
		$criteria->select = 'SUM(amount) as amount,service_id,period_id';
		$criteria->group = 'service_id';
		$criteria->condition = 'period_id = :period_id';
		$criteria->params = array('period_id'=>$period_id);
		
		return $this->findAll($criteria);
	}

	
	public function getTotalRevenueLocale()
	{
		return $this->getTotalLocale();
	}
	
	public function getTotalLocale() 
	{
		return Yii::app()->locale->numberFormatter->formatCurrency($this->totalRevenue,'IDR');
	}
	
	public function getServiceName()
	{
		return $this->service?$this->service->name:'--';
	}
	
	public function getStatusRevenue()
	{
		if($this->status == self::STATUS_RECEIVED){
			return Yii::t('app','Received');
		} else {
			return Yii::t('app','Not Received');
		}
	}
	
	public function findAllCustomerRevenueByPeriodId($period_id) 
	{
		return $this->findAll('customer_id IS NOT NULL AND period_id = :period_id',array(
			'period_id' => $period_id,
		));
	}
	
	public function totalCustomerRevenueByPeriodId($period_id)
	{
		return Yii::app()->db->createCommand('SELECT SUM(amount) 
											FROM revenue
											WHERE period_id = :period_id
											AND customer_id IS NOT NULL')
											->query(array(
												'period_id'=>$period_id
											))->readColumn(0);
	}
	
	
	public function getAmountLocale()
	{
		return Yii::app()->locale->numberFormatter->formatCurrency($this->amount,'IDR');
	}
	
	public function totalRevenueByPeriodId($period_id)
	{
		return Yii::app()->db->createCommand('SELECT SUM(amount) 
											FROM revenue
											WHERE period_id = :period_id')
											->query(array(
												'period_id'=>$period_id
											))->readColumn(0);
	}

	public function totalRevenueByPeriodIdLocale($period_id)
	{
		return Yii::app()->locale->numberFormatter->formatCurrency($this->totalRevenueByPeriodId($period_id),'IDR');
	}
	
}
