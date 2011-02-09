<?php

/**
 * This is the model class for table "statistic_arpu".
 *
 * The followings are the available columns in table 'statistic_arpu':
 * @property integer $id
 * @property integer $periode_id
 * @property double $value
 */
class StatisticArpu extends ActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return StatisticArpu the static model class
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
		return 'statistic_arpu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('periode_id, value', 'required'),
			array('periode_id', 'numerical', 'integerOnly'=>true),
			array('value', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, periode_id, value', 'safe', 'on'=>'search'),
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
			'periode_id' => Yii::t('app','Periode'),
			'value' => Yii::t('app','Value'),
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
		$criteria->compare('periode_id',$this->periode_id);
		$criteria->compare('value',$this->value);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	public function createByPeriod($period_id) {
		$staticArpu = new StatisticArpu;
		$staticArpu->period_id = $period_id;
	}
}
