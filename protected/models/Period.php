<?php

/**
 * This is the model class for table "period".
 *
 * The followings are the available columns in table 'period':
 * @property integer $id
 * @property string $month
 * @property string $year
 * @property string $raw_date
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
			array('month, year', 'required'),
			array('month, year', 'length', 'max'=>255),
			array('raw_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, month, year, raw_date', 'safe', 'on'=>'search'),
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
			'month' => Yii::t('app','Month'),
			'year' => Yii::t('app','Year'),
			'raw_date' => Yii::t('app','Raw Date'),
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
		$criteria->compare('month',$this->month,true);
		$criteria->compare('year',$this->year,true);
		$criteria->compare('raw_date',$this->raw_date,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	public function addPeriod()
	{
		$period = new Period();
		$period->year = date('Y');
		$period->month = date('m');
		$period->raw_date = date('Y-m');
		$period->save();
		return $period;
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
				$invoiceItem->save();
				$invoice->total_amount += $invoiceItem->amount;
				$invoice->total_compensation += $invoiceItem->subtotal_compensation;
			}
			
			$invoice->save();
		}
	}
	
	
}
