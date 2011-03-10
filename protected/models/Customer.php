<?php

/**
 * This is the model class for table "customer".
 *
 * The followings are the available columns in table 'customer':
 * @property integer $id
 * @property interger $status
 * @property integer $user_id
 * @property string $contact_number
 * @property integer $ownership
 * @property date $hire_up_to
 * @property integer $rating
 * @property integer $delay_count
 * @property integer $advance_count
 * @property integer $service_package_id
 * @property date $registered_date
 
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
	
	const OWNERSHIP_OWNER = 1;
	const OWNERSHIP_RENTER = 2;
	
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
			array('user_id, serviceIds, service_package_id, contact_number, apartment_id, ownership,hire_up_to', 'required'),
			array('user_id, status', 'numerical', 'integerOnly'=>true),
			array('rating, delay_count, advance_count', 'length', 'max'=>255),
			array('status','default','value'=>self::STATUS_ACTIVE),
			array('hire_up_to, registered_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, number, user_id, status, service_package_id, ownership, hire_up_to', 'safe', 'on'=>'search'),
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
			'apartment' => array(self::BELONGS_TO, 'Apartment', 'apartment_id'),
			'invoices' => array(self::HAS_MANY, 'Invoice', 'customer_id'),
			'invoiceItems' => array(self::HAS_MANY, 'InvoiceItem', 'customer_id'),
			'tickets' => array(self::HAS_MANY, 'Ticket', 'customer_id'),
			'services'=>array(self::MANY_MANY,'Service','customer_has_service(customer_id,service_id)','index'=>'id'),
			'servicePackage' => array(self::BELONGS_TO, 'ServicePackage', 'service_package_id'),
		);
	}
	
	public function scopes()
	{
		return array(
			'active' => array(
				'condition' => 'status = :status',
				'params' => array('status' => self::STATUS_ACTIVE),
			),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app','ID'),
			'user_id' => Yii::t('app','User'),
			'status' => Yii::t('app','Status'),
			'statusCustomer' => Yii::t('app','Status'), 
			'ownership' => Yii::t('app','Apartement Ownership'),
			'hire_up_to' => Yii::t('app','Hire Up To'),
			'serviceIds'=>Yii::t('app','Service'),
			'service_package_id'=>Yii::t('app','Service Package'),
			'contact_number' => Yii::t('app','Contact Number'),
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
		$criteria->compare('t.id',$this->id);
		$criteria->compare('ownership',$this->ownership);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('t.status',$this->status);
		$criteria->compare('ownership',$this->ownership);
		$criteria->compare('hire_up_to',$this->hire_up_to);
		$criteria->compare('service_package_id',$this->service_package_id);
		if (!$all) {
			$criteria->compare('t.status', self::STATUS_ACTIVE);
		}
		if ($this->serviceIds !== null) {
			$serviceIds = !empty($this->serviceIds)?implode(',',$this->serviceIds):'0';
			$criteria->addCondition('t.id IN (SELECT customer_id  
				FROM customer_has_service 
				WHERE customer_id = t.id 
					AND service_id IN (' . $serviceIds . '))');
		} 
		$criteria->with = array('user');
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	protected function beforeValidate()
	{
		$this->serviceIds = array_keys($this->servicePackage->services);
		return parent::beforeValidate();
	}
	
	protected function beforeSave()
	{
		$this->user->status = $this->status;
		if(!$this->isNewRecord){
			$this->deleteCustomerHasService();
		} else {
			$this->registered_date = date('Y-m-d');
		}
		return parent::beforeSave();
	}
	
	protected function afterSave()
	{
		$this->saveCustomerService();
	}
	
	protected function beforeDelete()
	{
		foreach($this->services as $services){
			$services->delete();
		}
		
		return parent::beforeDelete();
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
	
	private function deleteCustomerHasService()
	{
		$this->dbConnection->createCommand(
			'DELETE FROM customer_has_service
			 WHERE customer_id = :customer_id'
			)->query(array('customer_id'=>$this->id));
	}
	
	public function getRawServices()
	{
		$services = CHtml::listData($this->services,'id','name');
		sort($services);
		return implode(', ', $services);
	}
	
	public function afterFind() {
		$this->serviceIds = array_keys($this->services);
		return parent::afterFind();
	}

	public function findAllActive()
	{
		return $this->findAllByAttributes(array('status' => self::STATUS_ACTIVE));
	}
	
	public function findAllActiveBefore($date)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = 'status = :status AND registered_date <= :date';
		$criteria->params = array(
			'status' => self::STATUS_ACTIVE,
			'date' => $date,
		);
		
		return $this->findAll($criteria);
		
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
		
		return $invoice->save();
	}
	
	protected function afterValidate()
	{
		if($this->ownership == self::OWNERSHIP_OWNER){
			$this->clearErrors('hire_up_to');
		}
		
		return parent::afterValidate();
	}
	
	protected function afterDelete()
	{
		parent::afterDelete();
		$user = User::model()->findbyPk($this->user_id);
		$user->delete();
	}
	
	public function getDisplayFullName()
	{
		return $this->user->fullname;
	}
	
	public function getStatusCustomer()
	{
		return $this->status == self::STATUS_ACTIVE?Yii::t('app','Active'):Yii::t('app','Non-Active'); 
	}
	
	public function getDisplayOwnership()
	{
		if($this->ownership == self::OWNERSHIP_RENTER){
			return CHtml::encode(Yii::t('app','Hire Up To {hire_up}',array(
				'{hire_up}'=>date('j F Y',strtotime($this->hire_up_to)
			))));
		} else {
			return CHtml::encode(Yii::t('app','Owner'));
		}
	}
	
	public function getName()
	{
		return $this->user->fullname;
	}
	
	public function getDisplayServicePackage()
	{
		return $this->servicePackage->name;
	}
	
	public function getDisplayCountService()
	{
		return $this->countService;
	}
	
	public function findServicePackage()
	{
		$criteria = new CDbCriteria;
		$criteria->select = 'service_package_id,count(service_package_id) as countService';
		$criteria->group = 'service_package_id';
		
		return $this->findAll($criteria);
	}
}
