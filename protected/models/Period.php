<?php

/**
 * This is the model class for table "period".
 *
 * The followings are the available columns in table 'period':
 * @property integer $id
 * @property string $name
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
			array('name', 'required'),
			array('name', 'length', 'max'=>255),
			array('raw_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name , raw_date', 'safe', 'on'=>'search'),
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
		$criteria->compare('name',$this->month,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

	public function addPeriod()
	{
		if (!$this->findByAttributes(array('name' => date('F Y')))) {
			$period = new Period();
			$period->name = date('F Y');
			$period->save();
			return $period;
		}
		return false;
	}
	
	public function generateInvoices()
	{
		
		foreach(Customer::model()->findAllActive() as $customer) {
			$invoice = new Invoice();
			$invoice->total_amount = 0;
			$invoice->total_compensation = 0;
			$invoice->customer_id = $customer->id;
			$invoice->period_id = $this->id;
			$invoice->save();
			
			foreach($customer->services as $service) {
				$invoiceItem = new InvoiceItem;
				$invoiceItem->amount = $service->price;
				$invoiceItem->subtotal_compensation = 0;
				$invoiceItem->customer_id = $customer->id;
				$invoiceItem->period_id = $this->id;
				$invoiceItem->invoice_id = $invoice->id;
				$invoiceItem->service_id = $service->id;
				$invoiceItem->save();
				$invoice->total_amount += $invoiceItem->amount;
				$invoice->total_compensation += $invoiceItem->subtotal_compensation;
			}
			
			$invoice->save();
		}
	}
	
	
}
