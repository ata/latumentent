<?php

/**
 * This is the model class for table "service_package".
 *
 * The followings are the available columns in table 'service_package':
 * @property integer $id
 * @property string $name
 * @property string $note
 */
class ServicePackage extends ActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ServicePackage the static model class
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
		return 'service_package';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, note', 'length', 'max'=>255),
			array('name,note,serviceIds','required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, note', 'safe', 'on'=>'search'),
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
			'services'=>array(self::MANY_MANY,'Service','service_package_has_service(service_package_id,service_id)','index'=>'id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app','ID'),
			'name' => Yii::t('app','Name'),
			'note' => Yii::t('app','Note'),
			'serviceIds' => Yii::t('app','Service'),
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('note',$this->note,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	protected function beforeSave()
	{
		if(!$this->isNewRecord){
			$this->deleteServicePackageHasService();
		}
		return parent::beforeSave();
	}
	
	protected function afterSave()
	{
		$this->saveServicePackageHasService();
	}
	
	private function saveServicePackageHasService()
	{
		foreach($this->serviceIds as $serviceIds){
			$this->dbConnection->createCommand("
				INSERT IGNORE into service_package_has_service (service_id,service_package_id)
				VALUES (:service_id,:service_package_id)
			")->query(array('service_id'=>$serviceIds,'service_package_id'=>$this->id));
		}
	}
	
	private function deleteServicePackageHasService()
	{
		$this->dbConnection->createCommand(
			'DELETE FROM service_package_has_service 
			 WHERE service_package_id = :service_package_id'
			)->query(array('service_package_id'=>$this->id));
	}
	
	public function afterFind()
	{
		$this->serviceIds = array_keys($this->services);
		return parent::afterFind();
	}
	
	public function getCustomerCount()
	{
		return Customer::model()->count('service_package_id = :id',array('id'=>$this->id));
	}
}
