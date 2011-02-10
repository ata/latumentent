<?php

/**
 * This is the model class for table "invoice".
 *
 * The followings are the available columns in table 'invoice':
 * @property integer $id
 * @property double $total_amount
 * @property double $total_compensation
 * @property integer $period_id
 * @property integer $customer_id
 * @property integer $payment_method_id
 * @property integer $status
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property Customer $customer
 * @property Period $period
 * @property InvoiceItem[] $invoiceItems
 * @property Ticket[] $tickets
 */
class Invoice extends ActiveRecord
{
	
	const STATUS_NOT_PAID = 0;
	const STATUS_PAID = 1;
	
	public $serviceIds;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Invoice the static model class
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
		return 'invoice';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('total_amount, total_compensation, period_id, customer_id', 'required'),
			array('period_id, status, customer_id, user_id, payment_method_id', 'numerical', 'integerOnly'=>true),
			array('total_amount, total_compensation', 'numerical'),
			array('status','default','value'=>self::STATUS_NOT_PAID),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, total_amount, total_compensation, period_id, customer_id, serviceIds', 'safe', 'on'=>'search'),
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
			'customer' => array(self::BELONGS_TO, 'Customer', 'customer_id'),
			'period' => array(self::BELONGS_TO, 'Period', 'period_id'),
			'invoiceItems' => array(self::HAS_MANY, 'InvoiceItem', 'invoice_id'),
			'tickets' => array(self::HAS_MANY, 'Ticket', 'invoice_id'),
			'services' => array(self::MANY_MANY, 'Service', 'invoice_item(invoice_id, service_id)', 'index' => 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app','ID'),
			'total_amount' => Yii::t('app','Total Amount'),
			'total_compensation' => Yii::t('app','Total Compensation'),
			'period_id' => Yii::t('app','Period'),
			'customer_id' => Yii::t('app','Customer'),
			'serviceIds' => Yii::t('app','Service'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($all = false)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->with = array('invoiceItems',array('together'=>true));
		$criteria->together = true;
		$criteria->compare('t.sid',$this->id);
		$criteria->compare('t.total_amount',$this->total_amount);
		$criteria->compare('t.total_compensation',$this->total_compensation);
		$criteria->compare('t.period_id',$this->period_id);
		$criteria->compare('t.customer_id',$this->customer_id);
		if($this->serviceIds !== null){
			$serviceIds = !empty($this->serviceIds)?implode(',',$this->serviceIds):'0';
			$criteria->addCondition('invoiceItems.service_id in ('. $serviceIds .')');
		}
		
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	protected function beforeSave()
	{
		$this->user_id = $this->customer->user_id;
		return parent::beforeSave();
	}
	protected function beforeDelete()
	{
		foreach($this->invoiceItem as $invoiceItems){
			$invoiceItem->delete();
		}
		
		return parent::beforeDelete();
	}
	
	public function findAllByPeriodId($period_id) 
	{
		return $this->findAllByAttributes(array('period_id' => $period_id));
	}
	
	
	
	public function findByUserId($user_id)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = 'customer.user_id = :user_id';
		$criteria->with = array('customer');
		$criteria->params = array('user_id' => $user_id);
		
		return $this->find($criteria);
	}
	
	public function getTotalAmountLocale() 
	{
		return Yii::app()->locale->numberFormatter->formatCurrency($this->total_amount,'IDR');
	}
	
	public function getRawServices()
	{
		$services = CHtml::listData($this->services,'id','name');
		sort($services);
		return implode(', ', $services);
	}
	
	public function getTotalCompensationLocale() 
	{
		return Yii::app()->locale->numberFormatter->formatCurrency($this->total_compensation,'IDR');
	}
	
	public function getTotalBills($period_id = null)
	{
		if ($period_id == null) {
			$period_id = $this->period_id;
		}
		return array_sum(CHtml::listData($this->findAllByPeriodId($period_id),'id','total_amount'));
	}
	
	public function getTotalBillsLocale()
	{
		return Yii::app()->locale->numberFormatter->formatCurrency($this->totalBills,'IDR');
	}
	
	
	public function getStatusDisplay()
	{
		if ($this->status == self::STATUS_NOT_PAID) {
			return Yii::t('app','Not Paid ({link})',array(
				'{link}' => CHtml::link(Yii::t('app','Pay'),array('invoice/pay','id' => $this->id))
			));
		}
		return Yii::t('app','Paid');
	}
	
	
	
	public function pay()
	{
		$revenue = new Revenue;
		
		$this->status = self::STATUS_PAID;
		return $this->save(false);
	}
	
	public function findAllPaidByPeriodId($period_id)
	{
		return $this->findAllByAttributes(array(
			'status' => self::STATUS_PAID,
			'period_id' => $period_id,
		));
	}
}
