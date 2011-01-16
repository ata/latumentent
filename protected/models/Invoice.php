<?php

/**
 * This is the model class for table "invoice".
 *
 * The followings are the available columns in table 'invoice':
 * @property string $id
 * @property string $total_amount
 * @property string $total_compensation
 * @property string $period_id
 * @property string $customer_id
 *
 * The followings are the available model relations:
 * @property Period $period
 * @property Customer $customer
 * @property InvoiceItem[] $invoiceItems
 */
class Invoice extends ActiveRecord
{
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
			array('period_id, customer_id', 'required'),
			array('total_amount, period_id, customer_id', 'length', 'max'=>20),
			array('total_compensation', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, total_amount, total_compensation, period_id, customer_id', 'safe', 'on'=>'search'),
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
			'period' => array(self::BELONGS_TO, 'Period', 'period_id'),
			'customer' => array(self::BELONGS_TO, 'Customer', 'customer_id'),
			'invoiceItems' => array(self::HAS_MANY, 'InvoiceItem', 'invoice_id'),
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('total_amount',$this->total_amount,true);
		$criteria->compare('total_compensation',$this->total_compensation,true);
		$criteria->compare('period_id',$this->period_id,true);
		$criteria->compare('customer_id',$this->customer_id,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
