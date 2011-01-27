<?php

/**
 * This is the model class for table "setting".
 *
 * The followings are the available columns in table 'setting':
 * @property integer $id
 * @property string $key
 * @property string $value
 */
class Setting extends ActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Setting the static model class
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
		return 'setting';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('key, value', 'required'),
			array('key, value', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, key, value', 'safe', 'on'=>'search'),
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
			'key' => Yii::t('app','Key'),
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
		$criteria->compare('key',$this->key,true);
		$criteria->compare('value',$this->value,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	public function get($key, $default = null)
	{
		$setting = $this->findByAttributes(array('key' => $key));
		
		if ($setting === null && $default !== null) {
			$setting = new Setting;
			$setting->key = $key;
			$setting->value = $default;
			$setting->save();
			return $setting->value;
		}
		
		return $setting->value;
	}
}
