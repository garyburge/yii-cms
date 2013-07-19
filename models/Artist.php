<?php

/**
 * This is the model class for table "artist".
 *
 * The followings are the available columns in table 'artist':
 * @property integer $id
 * @property string $name
 * @property string $short_bio
 * @property string $bio
 * @property integer $media_id
 * @property string $email
 * @property string $url
 * @property integer $created
 * @property integer $updated
 *
 * The followings are the available model relations:
 * @property ArtistTag[] $artistTags
 */
class Artist extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Artist the static model class
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
		return 'artist';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, short_bio, created', 'required'),
			array('media_id, created, updated', 'numerical', 'integerOnly'=>true),
			array('name, email, url', 'length', 'max'=>255),
			array('bio', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, short_bio, bio, media_id, email, url, created, updated', 'safe', 'on'=>'search'),
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
			'artistTags' => array(self::HAS_MANY, 'ArtistTag', 'artist_id'),
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
			'short_bio' => 'Short Bio',
			'bio' => 'Bio',
			'media_id' => 'Media',
			'email' => 'Email',
			'url' => 'Url',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('short_bio',$this->short_bio,true);
		$criteria->compare('bio',$this->bio,true);
		$criteria->compare('media_id',$this->media_id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('created',$this->created);
		$criteria->compare('updated',$this->updated);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}