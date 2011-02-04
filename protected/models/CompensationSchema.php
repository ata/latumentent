<?php

/**
 * This is the model class for table "compensation_schema".
 *
 * The followings are the available columns in table 'compensation_schema':
 * @property integer $id
 * @property integer $uptime
 * @property integer $downtime
 * @property integer $percentdown
 * @property integer $percentup
 * @property double $compensation
 * @property integer $service_id
 */
class CompensationSchema extends ActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return CompensationSchema the static model class
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
		return 'compensation_schema';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uptime, downtime, percentdown, percentup, compensation, service_id', 'required'),
			array('uptime, downtime, percentdown, percentup, service_id', 'numerical', 'integerOnly'=>true),
			array('compensation', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, uptime, downtime, percentdown, percentup, compensation, service_id', 'safe', 'on'=>'search'),
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
			'uptime' => Yii::t('app','Uptime'),
			'downtime' => Yii::t('app','Downtime'),
			'percentdown' => Yii::t('app','Percentdown'),
			'percentup' => Yii::t('app','Percentup'),
			'compensation' => Yii::t('app','Compensation'),
			'service_id' => Yii::t('app','Service'),
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
		$criteria->compare('uptime',$this->uptime);
		$criteria->compare('downtime',$this->downtime);
		$criteria->compare('percentdown',$this->percentdown);
		$criteria->compare('percentup',$this->percentup);
		$criteria->compare('compensation',$this->compensation);
		$criteria->compare('service_id',$this->service_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
