<?php

/**
 * This is the model class for table "customer".
 *
 * The followings are the available columns in table 'customer':
 * @property integer $id
 * @property string $number
 * @property interger $status
 * @property integer $user_id
 * @property string $contact_number
 * @property integer $ownership
 * @property date $hire_up_to
 
 * The followings are the available model relations:
 * @property User $user
 * @property Invoice[] $invoices
 * @property InvoiceItem[] $invoiceItems
 * @property Ticket[] $tickets
 */
class Customer extends ActiveRecord
{
	
	const STATUS_ACTIVE = 1;
	const STATUS_DELETED = 2;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Customer the static model class
	 */
	
	public $serviceIds;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'customer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('number, user_id, serviceIds, contact_number, ownership', 'required'),
			array('user_id, status', 'numerical', 'integerOnly'=>true),
			array('number', 'length', 'max'=>255),
			array('status','default','value'=>self::STATUS_ACTIVE),
			array('hire_up_to', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, number, user_id', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'invoices' => array(self::HAS_MANY, 'Invoice', 'customer_id'),
			'invoiceItems' => array(self::HAS_MANY, 'InvoiceItem', 'customer_id'),
			'tickets' => array(self::HAS_MANY, 'Ticket', 'customer_id'),
			'services'=>array(self::MANY_MANY,'Service','customer_has_service(customer_id,service_id)','index'=>'id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app','ID'),
			'number' => Yii::t('app','No. Apartment'),
			'user_id' => Yii::t('app','User'),
			'status' => Yii::t('app','Status'),
			'ownership' => Yii::t('app','Apartement Ownership'),
			'hire_up_to' => Yii::t('app','Hire Up To'),
			'serviceIds'=>Yii::t('app','Service'),
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
		$criteria->compare('id',$this->id);
		$criteria->compare('number',$this->number,true);
		$criteria->compare('user_id',$this->user_id);
		if (!$all) {
			$criteria->compare('status', self::STATUS_ACTIVE);
		}
		
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	protected function beforeSave()
	{
		$this->user->status = $this->status;
		return parent::beforeSave();
	}
	
	protected function afterSave()
	{
		$this->saveCustomerService();
	}

	private function saveCustomerService()
	{
		foreach ($this->serviceIds as $serviceIds){
			$this->dbConnection->createCommand("
				INSERT IGNORE into customer_has_service (customer_id,service_id)
				VALUES (:customer_id,:service_id)
			")->query(array('customer_id'=>$this->id,'service_id'=>$serviceIds));
		}
	}

	public function getSelectedService()
	{
		return implode(',', CHtml::listData($this->services,'id','name'));
	}

	public function afterFind() {
		$this->serviceIds = array_keys($this->services);
		return parent::afterFind();
	}

	public function findAllActive()
	{
		return $this->findAllByAttributes(array('status' => self::STATUS_ACTIVE));
	}
	
	public function softDelete()
	{
		$this->status = self::STATUS_DELETED;
		$this->save(false);
	}
	
	public function userCustomerSoftDelete()
	{
		$this->softDelete();
		$this->user->softDelete();
	}
	
	public function findByUserId($user_id)
	{
		return $this->findByAttributes(array('user' => $user_id));
	}
	
	public function generateInvoices($period_id)
	{
		$invoice = new Invoice();
		$invoice->total_amount = 0;
		$invoice->total_compensation = 0;
		$invoice->customer_id = $this->id;
		$invoice->period_id = $period_id;
		if(!$invoice->save()){
			return false;
		}
		
		foreach($this->services as $service) {
			$invoiceItem = new InvoiceItem;
			$invoiceItem->amount = $service->price;
			$invoiceItem->subtotal_compensation = 0;
			$invoiceItem->customer_id = $this->id;
			$invoiceItem->period_id = $period_id;
			$invoiceItem->invoice_id = $invoice->id;
			$invoiceItem->service_id = $service->id;
			if (!$invoiceItem->save()) {
				return false;
			}
			$invoice->total_amount += $invoiceItem->amount;
			$invoice->total_compensation += $invoiceItem->subtotal_compensation;
		}
		
		$invoice->save();
	}
	
	protected function afterDelete()
	{
		parent::afterDelete();
		User::model()->delete('id='.$this->user_id);
	}
}
