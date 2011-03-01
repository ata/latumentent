<?php

/**
 * This is the model class for table "period".
 *
 * The followings are the available columns in table 'period':
 * @property integer $id
 * @property string $name
 * @property date $start
 * @property date $end
 * 
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
			array('name, start, end', 'required'),
			array('name', 'length', 'max'=>255),
			array('name','unique'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name', 'safe', 'on'=>'search'),
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
			'statisticClient' => array(self::HAS_ONE,'StatisticClient','period_id'),
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
		$criteria->compare('start',$this->start);
		$criteria->compare('end',$this->end);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

	public function addPeriod($name=null)
	{
		$_name = $name==null?date('F Y'):$name;
		
		if (!$this->findByAttributes(array('name' => $_name))) {
			$period = new Period();
			$period->name = $_name;
			$period->save();
			return $period;
		}
		return false;
	}
	
	private function getMonths()
	{
		return array(
			1 => Yii::t('app','January'),
			2 => Yii::t('app','February'),
			3 => Yii::t('app','March'),
			4 => Yii::t('app','April'),
			5 => Yii::t('app','May'),
			6 => Yii::t('app','June'),
			7 => Yii::t('app','July'),
			8 => Yii::t('app','August'),
			9 => Yii::t('app','September'),
			10 => Yii::t('app','October'),
			11 => Yii::t('app','November'),
			12 => Yii::t('app','December'),
		);
	}
	
	public function createAutoPeriod()
	{
		$monthNames = $this->getMonths();
		$thisMonth = (int) date('n');
		$nextMonth = $thisMonth == 12 ? 1 : $thisMonth + 1;
		$thisYear = (int) date('Y');
		$nextYear = $thisMonth == 12 ? $thisYear + 1 : $thisYear;
		$startDate = Setting::model()->get('PERIOD_START_DATE',21);
		$endDate = Setting::model()->get('PERIOD_END_DATE',20);
		$period = new Period;
		$period->start = sprintf('%s-%s-%s',$thisYear, $thisMonth, $startDate);
		$period->end = sprintf('%s-%s-%s',$nextYear, $nextMonth, $endDate);
		$period->name = sprintf('%s %s %s - %s %s %s', $startDate, 
								$monthNames[$thisMonth], $thisYear, $endDate,
								$monthNames[$nextMonth], $nextYear);
		return $period;
	}
	
	public function generateInvoices()
	{
		foreach(Customer::model()->findAllActive() as $customer) {
			$customer->generateInvoices($this->id);
		}
	}
	
	/**
	 * @deprecated
	 */
	public function generateStatistics()
	{
		$totalPeriodCustomerRevenue = Revenue::model()->totalCustomerRevenueByPeriodId($this->id);
		$totalPeriodCustomerCost = Cost::model()->totalCustomerCostByPeriodId($this->id);
		
		if ($this->statisticArpu == null) {
			$this->statisticArpu = new StatisticArpu;
			$this->statisticArpu->period_id = $this->id;
			$this->statisticArpu->value = $totalPeriodCustomerRevenue / $this->countCustomer();
			$this->statisticArpu->save();
		}
		
		
		if ($this->statisticCostClient == null) {
			$this->statisticCostClient = new StatisticCostClient;
			$this->statisticCostClient->period_id = $this->id;
			$this->statisticCostClient->value = $totalPeriodCustomerCost / $this->countCustomer();
			$this->statisticCostClient->save();
		}
		
		if ($this->statisticClient == null) {
			$this->statisticClient = new StatisticClient;
			$this->statisticClient->period_id = $this->id;
			$this->statisticClient->value = $this->countCustomer();
			$this->statisticClient->save();
		}
	}
	/**
	 * @deprecated
	 */
	public function generateCustomerRevenues()
	{
		foreach($this->invoices as $invoice) {
			foreach($invoice->invoiceItems as $item) {
				$revenue = new Revenue;
				$cost->name = Yii::t('app','From payment of {service}',array('{service}' => $item->service->name));
				$revenue->amount = $item->amount;
				$revenue->user_id = $item->customer_id;
				$revenue->customer_id = $item->customer_id;
				$revenue->period_id  = $item->period_id;
				$revenue->service_id = $item->service_id;
				$revenue->status = $invoice->status;
				$revenue->save();
			}
		}
	}
	/**
	 * @deprecated
	 * Kompensasi, seharusnya tergantung uptime nya
	 */
	public function generateCustomerCosts()
	{
		foreach($this->invoices as $invoice) {
			foreach($invoice->invoiceItems as $item) {
				if ($item->subtotal_compensation > 0) {
					$cost = new Cost;
					$cost->name = Yii::t('app','Compensation {service}',array('{service}' => $item->service->name));
					$cost->amount = $item->subtotal_compensation;
					$cost->user_id = $item->customer_id;
					$cost->customer_id = $item->customer_id;
					$cost->period_id  = $item->period_id;
					$cost->service_id = $item->service_id;
					$cost->status = $invoice->status;
					$cost->save();
				}
			}
		}
	}
	
	
	public function generatePeriodicCost()
	{
		foreach(PeriodicCost::model()->findAll() as $periodicCost) {
			$cost = new Cost;
			$cost->name = $periodicCost->name;
			$cost->amount = $periodicCost->amount;
			$cost->period_id  = $this->id;
			$cost->service_id = $periodicCost->service_id;
			$cost->save();
		}
	}
	
	public function updateStatistics()
	{
		$totalPeriodCustomerRevenue = Revenue::model()->totalCustomerRevenueByPeriodId($this->id);
		$totalPeriodCustomerCost = Cost::model()->totalCustomerCostByPeriodId($this->id);
		
		if ($this->statisticArpu == null) {
			$this->statisticArpu = new StatisticArpu;
			$this->statisticArpu->period_id = $this->id;
		}
		
		$this->statisticArpu->value = $totalPeriodCustomerRevenue / $this->countCustomer();
		$this->statisticArpu->save();
		
		
		if ($this->statisticCostClient == null) {
			$this->statisticCostClient = new StatisticCostClient;
			$this->statisticCostClient->period_id = $this->id;
		}
		
		$this->statisticCostClient->value = $totalPeriodCustomerCost / $this->countCustomer();
		$this->statisticCostClient->save();
		
		if ($this->statisticClient == null) {
			$this->statisticClient = new StatisticClient;
			$this->statisticClient->period_id = $this->id;
		}
		
		$this->statisticClient->value = $this->countCustomer();
		$this->statisticClient->save();
		
	}
	
	public function countCustomer()
	{
		return count($this->invoices);
	}
	
	public function open($name=null)
	{
		if ($lastPeriod = $this->last()->find()) {
			$lastPeriod->close();
		}
		if($newPeriod = $this->addPeriod($name)) {
			$newPeriod->generateInvoices();
			$newPeriod->generatePeriodicCost();
			$newPeriod->updateStatistics();
		}
	}
	
	public function close()
	{
		//$this->generateCustomerRevenues();
		//$this->generateCustomerCosts();
		//$this->generateStatistics();
	}
	
	
	public function getPaidInvoices()
	{
		return Invoice::model()->findAllPaidByPeriodId($this->id);
	}
	
	private $_lastId = null;
	public function getLastId()
	{
		if ($this->_lastId !== null) {
			return $this->_lastId;
		}
		return $this->_lastId = $this->last()->find()?$this->last()->find()->id:-9999;
	}
	
	public function getLastPeriodId()
	{
		return $this->getLastId();
	}
	
}
