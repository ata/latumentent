<?php

/**
 * This is the model class for table "ticket_reply".
 *
 * The followings are the available columns in table 'ticket_reply':
 * @property integer $id
 * @property integer $ticket_id
 * @property string $message
 * @property integer $author_id
 * @property string $time
 */
class TicketReply extends ActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TicketReply the static model class
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
		return 'ticket_reply';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ticket_id, author_id, message', 'required'),
			array('ticket_id, author_id', 'numerical', 'integerOnly'=>true),
			array('time','default','value'=> date('Y-m-d h:i:s')),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, ticket_id, message, author_id, time', 'safe', 'on'=>'search'),
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
			'author' => array(self::BELONGS_TO, 'User', 'author_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('app','ID'),
			'ticket_id' => Yii::t('app','Ticket'),
			'message' => Yii::t('app','Message'),
			'author_id' => Yii::t('app','Author'),
			'time' => Yii::t('app','Time'),
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
		$criteria->compare('ticket_id',$this->ticket_id);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('author_id',$this->author_id);
		$criteria->compare('time',$this->time,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
