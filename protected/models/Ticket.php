<?php

/**
 * This is the model class for table "ticket".
 *
 * The followings are the available columns in table 'ticket':
 * @property string $id
 * @property string $title
 * @property string $body
 * @property string $compensation
 * @property string $status
 * @property string $invoice_id
 * @property string $invoice_item_id
 * @property string $technician_id
 */
class Ticket extends ActiveRecord
{
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
			array('status, invoice_id, invoice_item_id, technician_id', 'required'),
			array('title', 'length', 'max'=>255),
			array('compensation, invoice_id, invoice_item_id, technician_id', 'length', 'max'=>20),
			array('status', 'length', 'max'=>6),
			array('body', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, body, compensation, status, invoice_id, invoice_item_id, technician_id', 'safe', 'on'=>'search'),
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
			'compensation' => Yii::t('app','Compensation'),
			'status' => Yii::t('app','Status'),
			'invoice_id' => Yii::t('app','Invoice'),
			'invoice_item_id' => Yii::t('app','Invoice Item'),
			'technician_id' => Yii::t('app','Technician'),
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('body',$this->body,true);
		$criteria->compare('compensation',$this->compensation,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('invoice_id',$this->invoice_id,true);
		$criteria->compare('invoice_item_id',$this->invoice_item_id,true);
		$criteria->compare('technician_id',$this->technician_id,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
