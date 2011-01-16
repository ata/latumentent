<?php

/**
 * This is the model class for table "invoice_item".
 *
 * The followings are the available columns in table 'invoice_item':
 * @property string $id
 * @property string $amount
 * @property string $invoice_id
 * @property string $service_id
 * @property string $subtotal_compensation
 *
 * The followings are the available model relations:
 * @property Invoice $invoice
 * @property Service $service
 */
class InvoiceItem extends ActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return InvoiceItem the static model class
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
		return 'invoice_item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('invoice_id, service_id', 'required'),
			array('amount, invoice_id, service_id, subtotal_compensation', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, amount, invoice_id, service_id, subtotal_compensation', 'safe', 'on'=>'search'),
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
			'invoice' => array(self::BELONGS_TO, 'Invoice', 'invoice_id'),
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
			'amount' => Yii::t('app','Amount'),
			'invoice_id' => Yii::t('app','Invoice'),
			'service_id' => Yii::t('app','Service'),
			'subtotal_compensation' => Yii::t('app','Subtotal Compensation'),
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
		$criteria->compare('amount',$this->amount,true);
		$criteria->compare('invoice_id',$this->invoice_id,true);
		$criteria->compare('service_id',$this->service_id,true);
		$criteria->compare('subtotal_compensation',$this->subtotal_compensation,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
