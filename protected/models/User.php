<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $status
 * @property string $fullname
 * @property string $email
 * @property integer $role_id
 *
 * The followings are the available model relations:
 * @property Customer[] $customers
 * @property Ticket[] $tickets
 * @property Role $role
 */
class User extends ActiveRecord
{
	const STATUS_ACTIVE = 1;
	const STATUS_DELETED = 2;
	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, fullname, email, role_id', 'required'),
			array('role_id, status', 'numerical', 'integerOnly'=>true),
			array('username, password, fullname, email', 'length', 'max'=>255),
			array('status','default','value'=>self::STATUS_ACTIVE),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, status, fullname, password, email, role_id', 'safe', 'on'=>'search'),
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
			'customers' => array(self::HAS_ONE, 'Customer', 'user_id'),
			'tickets' => array(self::HAS_MANY, 'Ticket', 'technician_id'),
			'role' => array(self::BELONGS_TO, 'Role', 'role_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app','ID'),
			'username' => Yii::t('app','Username'),
			'password' => Yii::t('app','Password'),
			'fullname' => Yii::t('app','Full Name'),
			'email' => Yii::t('app','Email'),
			'role_id' => Yii::t('app','Role'),
            'fullname'=>Yii::t('app','Full Name'),
		);
	}
	
	protected function beforeSave()
	{
		if($this->isNewRecord){
			$this->password = md5($this->password);
		}
		return parent::beforeSave();
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
		$criteria->compare('username',$this->username);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('fullname',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('role_id',$this->role_id);
		$criteria->compare('status', $this->status);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	public function findAllActive()
	{
		return $this->findAllByAttributes(array('status' => self::STATUS_ACTIVE));
	}
	
	
	public function softDelete()
	{
		$this->status = self::STATUS_DELETED;
		$this->save();
	}
	
}
