<?php

/**
 * This is the model class for table "author".
 *
 * The followings are the available columns in table 'author':
 * @property integer $id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $phone
 * @property string $email
 * @property string $url
 * @property string $short_bio
 * @property string $bio
 * @property integer $media_id
 * @property integer $created
 * @property integer $updated
 *
 * The followings are the available model relations:
 * @property Media $media
 * @property AuthorContent[] $authorContents
 * @property Byline[] $bylines
 */
class Author extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Author the static model class
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
		return 'author';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, first_name, last_name, created', 'required'),
			array('id, media_id, created, updated', 'numerical', 'integerOnly'=>true),
			array('first_name, middle_name, last_name', 'length', 'max'=>64),
			array('phone', 'length', 'max'=>24),
			array('email', 'length', 'max'=>128),
			array('url', 'length', 'max'=>255),
			array('short_bio, bio', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, first_name, middle_name, last_name, phone, email, url, short_bio, bio, media_id, created, updated', 'safe', 'on'=>'search'),
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
			'media' => array(self::BELONGS_TO, 'Media', 'media_id'),
			'authorContents' => array(self::HAS_MANY, 'AuthorContent', 'author_id'),
			'bylines' => array(self::HAS_MANY, 'Byline', 'author_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'first_name' => 'First Name',
			'middle_name' => 'Middle Name',
			'last_name' => 'Last Name',
			'phone' => 'Phone',
			'email' => 'Email',
			'url' => 'Website',
			'short_bio' => 'Short Bio',
			'bio' => 'Bio',
			'media_id' => 'Media',
			'created' => 'Created',
			'updated' => 'Updated',
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
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('middle_name',$this->middle_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('short_bio',$this->short_bio,true);
		$criteria->compare('bio',$this->bio,true);
		$criteria->compare('media_id',$this->media_id);
		$criteria->compare('created',$this->created);
		$criteria->compare('updated',$this->updated);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}