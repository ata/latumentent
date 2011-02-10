<?php

/**
 * This is the model class for table "period".
 *
 * The followings are the available columns in table 'period':
 * @property integer $id
 * @property string $name
 * @property double total_revenue
 * @property double total_outlay
 * The followings are the available model relations:
 * @property Invoice[] $invoices
 * @property InvoiceItem[] $invoiceItems
 * @property Ticket[] $tickets
 */
class Period extends ActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Period the static model class
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
		return 'period';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('name', 'length', 'max'=>255),
			array('total_revenue, total_outlay', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, total_revenue, total_outlay', 'safe', 'on'=>'search'),
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
			'invoices' => array(self::HAS_MANY, 'Invoice', 'period_id'),
			'invoiceItems' => array(self::HAS_MANY, 'InvoiceItem', 'period_id'),
			'tickets' => array(self::HAS_MANY, 'Ticket', 'period_id'),
			'statisticCostClient' => array(self::HAS_ONE,'StatisticCostClient','period_id'),
			'statisticArpu' => array(self::HAS_ONE,'StatisticArpu','period_id'),
			'statisticCostClient' => array(self::HAS_ONE,'StatisticCostClient','period_id'),
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
			'total_revenue' => Yii::t('app','Total Revenue'),
			'total_outlay' => Yii::t('app','Total Outlay'),
		);
	}
	
	public function scopes()
	{
		return array(
			'desc' => array('order' => 'id DESC'),
			'last' => array('order' => 'id DESC', 'limit' => 1),
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('total_revenue',$this->total_revenue);
		$criteria->compare('total_outlay',$this->total_outlay);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

	public function addPeriod($name=null)
	{
		if (!$this->findByAttributes(array('name' => date('F Y')))) {
			$period = new Period();
			$period->name = $name==null?date('F Y'):$name;
			$period->save();
			return $period;
		}
		return false;
	}
	
	public function generateInvoices()
	{
		foreach(Customer::model()->findAllActive() as $customer) {
			$customer->generateInvoices($this->id);
		}
		
	}
	
	public function generateStatistics()
	{
		$totalPeriodCustomerRevenue = Revenue::model()->totalCustomerRevenueByPeriodId($this->id);
		$totalPeriodCustomerCost = Cost::model()->totalCustomerCostByPeriodId($period_id);
		
		if ($this->statisticArpu == null) {
			$this->statisticArpu = new StatisticArpu;
			$this->statisticArpu->period_id = $this->id;
			$this->statisticArpu->value = $totalPeriodCustomerRevenue / $this->countCustomer;
			$this->statisticArpu->save();
		}
		
		
		if ($this->statisticArpu == null) {
			$this->statisticArpu = new StatisticArpu;
			$this->statisticArpu->period_id = $this->id;
			$this->statisticArpu->value = $totalPeriodCustomerCost / $this->countCustomer;
			$this->statisticArpu->save();
		}
		
		if ($this->statisticClient == null) {
			$this->statisticClient = new StatisticClient;
			$this->statisticClient->period_id = $this->id;
			$this->statisticClient->value = $this->countCustomer;
			$this->statisticClient->save();
		}
	}
	
	public function generateCustomerRevenues()
	{
		foreach($this->invoices as $invoice) {
			foreach($invoice->invoiceItems as $item) {
				$revenue = new Revenue;
				$revenue->amount = $item->amount;
				$revenue->user_id = $item->customer_id;
				$revenue->customer_id = $item->customer_id;
				$revenue->period_id  = $item->period_id;
				$revenue->service_id = $service->id;
				$revenue->status = $invoice->status;
				$revenue->save();
			}
		}
	}
	
	public function generateCustomerCosts()
	{
		foreach($this->invoices as $invoice) {
			foreach($invoices->invoiceItems as $item) {
				$cost = new Cost;
				$cost->amount = $item->subtotal_compensation;
				$cost->user_id = $item->customer_id;
				$cost->customer_id = $item->customer_id;
				$cost->period_id  = $item->period_id;
				$cost->service_id = $service->id;
				$cost->status = $invoice->status;
				$cost->save();
			}
		}
	}
	
	
	public function countCustomer()
	{
		return count($this->invoices);
	}
	
	
	public function getPaidInvoices()
	{
		return Invoice::model()->findAllPaidByPeriodId($this->id);
	}
}
