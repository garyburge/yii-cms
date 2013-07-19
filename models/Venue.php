<?php

/**
 * This is the model class for table "venue".
 *
 * The followings are the available columns in table 'venue':
 * @property integer $id
 * @property string $name
 * @property string $short_description
 * @property string $long_description
 * @property string $street_address1
 * @property string $street_address2
 * @property string $city
 * @property string $state
 * @property string $zipcode
 * @property string $phone
 * @property string $email
 * @property string $url
 * @property string $map_url
 * @property integer $media_id
 * @property string $thumbnail
 *
 * The followings are the available model relations:
 * @property Media $media
 */
class Venue extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Venue the static model class
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
		return 'venue';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, short_description, street_address1, city, state, zipcode', 'required'),
			array('media_id', 'numerical', 'integerOnly'=>true),
			array('name, url, map_url, thumbnail', 'length', 'max'=>255),
			array('street_address1, street_address2, city, email', 'length', 'max'=>128),
			array('state', 'length', 'max'=>2),
			array('zipcode', 'length', 'max'=>10),
			array('phone', 'length', 'max'=>12),
			array('long_description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, short_description, long_description, street_address1, street_address2, city, state, zipcode, phone, email, url, map_url, media_id, thumbnail', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'short_description' => 'Short Description',
			'long_description' => 'Long Description',
			'street_address1' => 'Street Address1',
			'street_address2' => 'Street Address2',
			'city' => 'City',
			'state' => 'State',
			'zipcode' => 'Zipcode',
			'phone' => 'Phone',
			'email' => 'Email',
			'url' => 'Url',
			'map_url' => 'Map Url',
			'media_id' => 'Media',
			'thumbnail' => 'Thumbnail',
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
		$criteria->compare('short_description',$this->short_description,true);
		$criteria->compare('long_description',$this->long_description,true);
		$criteria->compare('street_address1',$this->street_address1,true);
		$criteria->compare('street_address2',$this->street_address2,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('zipcode',$this->zipcode,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('map_url',$this->map_url,true);
		$criteria->compare('media_id',$this->media_id);
		$criteria->compare('thumbnail',$this->thumbnail,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}