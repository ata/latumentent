<?php

/**
 * This is the model class for table "ticket".
 *
 * The followings are the available columns in table 'ticket':
 * @property integer $id
 * @property string $title
 * @property string $body
 * @property integer $status
 * @property double $compensation
 * @property integer $invoice_id
 * @property integer $invoice_item_id
 * @property integer $period_id
 * @property integer $customer_id
 * @property integer $technician_id
 * @property integer $author_id
 * @property integer $service_id
 * @property integer $problem_type_id
 * @property datetime $time_open 
 * @property datetime $time_closed
 * @property boolean $solved
 * 
 * The followings are the available model relations:
 * @property User $author
 * @property Customer $customer
 * @property Invoice $invoice
 * @property InvoiceItem $invoiceItem
 * @property Period $period
 * @property User $technician
 */
class Ticket extends ActiveRecord
{
	
	const STATUS_OPEN = 1;
	const STATUS_CLOSED = 2;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Ticket the static model class
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
		return 'ticket';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, body, service_id, invoice_id, invoice_item_id, period_id, customer_id, author_id', 'required'),
			array('status, invoice_id, service_id, invoice_item_id, period_id, customer_id, technician_id, author_id', 'numerical', 'integerOnly'=>true),
			array('compensation', 'numerical'),
			array('title', 'length', 'max'=>255),
			array('status','default','value'=>self::STATUS_OPEN),
			array('solved','default','value'=>false),
			array('time_open','default','value'=> date('Y-m-d')),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, time_open, time_closed, problem_type_id, solved, body, status, compensation, service_id, invoice_id, invoice_item_id, period_id, customer_id, technician_id, author_id', 'safe', 'on'=>'search'),
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
			'author' => array(self::BELONGS_TO, 'User', 'author_id'),
			'customer' => array(self::BELONGS_TO, 'Customer', 'customer_id'),
			'invoice' => array(self::BELONGS_TO, 'Invoice', 'invoice_id'),
			'invoiceItem' => array(self::BELONGS_TO, 'InvoiceItem', 'invoice_item_id'),
			'period' => array(self::BELONGS_TO, 'Period', 'period_id'),
			'technician' => array(self::BELONGS_TO, 'User', 'technician_id'),
			'service' => array(self::BELONGS_TO, 'Service', 'service_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app','ID'),
			'title' => Yii::t('app','Title'),
			'body' => Yii::t('app','Body'),
			'status' => Yii::t('app','Status'),
			'compensation' => Yii::t('app','Compensation'),
			'invoice_id' => Yii::t('app','Invoice'),
			'invoice_item_id' => Yii::t('app','Invoice Item'),
			'period_id' => Yii::t('app','Period'),
			'customer_id' => Yii::t('app','Customer'),
			'technician_id' => Yii::t('app','Technician'),
			'author_id' => Yii::t('app','Author'),
			'time_open' => Yii::t('app','Time Open'),
			'time_closed' => Yii::t('app','Time Closed'),
			'type_problem_id' => Yii::t('app','Type of Problem'),
			'solved' => Yii::t('app','Solved'),
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('body',$this->body,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('compensation',$this->compensation);
		$criteria->compare('invoice_id',$this->invoice_id);
		$criteria->compare('invoice_item_id',$this->invoice_item_id);
		$criteria->compare('period_id',$this->period_id);
		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('technician_id',$this->technician_id);
		$criteria->compare('author_id',$this->author_id);
		$criteria->compare('service_id',$this->author_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	protected function beforeValidate()
	{
		if ($this->service_id == null) {
			$this->service_id = $this->invoiceItem->service_id;
		}
		
		if ($this->invoice_id == null) {
			$this->invoice_id = $this->invoiceItem->invoice_id;
		}
		
		if ($this->period_id == null) {
			$this->period_id = Period::model()->last()->find()->id;
		}
		
		if ($this->customer_id == null) {
			$this->customer_id = $this->author->customer->id;
		}
		
		
		return parent::beforeValidate();
	}
	
	public function getCompensationLocale() 
	{
		return Yii::app()->locale->numberFormatter->formatCurrency($this->compensation,'IDR');
	}
	
}
