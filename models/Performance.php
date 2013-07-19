<?php

/**
 * This is the model class for table "performance".
 *
 * The followings are the available columns in table 'performance':
 * @property integer $id
 * @property integer $live_id
 * @property integer $venue_id
 * @property integer $genre_id
 * @property string $starts_at
 * @property string $ends_at
 * @property string $title
 * @property string $description
 * @property string $url
 * @property integer $media_id
 * @property string $position
 * @property string $tickets
 * @property integer $created
 * @property integer $updated
 */
class Performance extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Performance the static model class
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
		return 'performance';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('live_id, venue_id, genre_id, title', 'required'),
			array('live_id, venue_id, genre_id, media_id, created, updated', 'numerical', 'integerOnly'=>true),
			array('title, url, tickets', 'length', 'max'=>255),
			array('position', 'length', 'max'=>6),
			array('starts_at, ends_at, description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, live_id, venue_id, genre_id, starts_at, ends_at, title, description, url, media_id, position, tickets, created, updated', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'live_id' => 'Live',
			'venue_id' => 'Venue',
			'genre_id' => 'Genre',
			'starts_at' => 'Starts At',
			'ends_at' => 'Ends At',
			'title' => 'Title',
			'description' => 'Description',
			'url' => 'Url',
			'media_id' => 'Media',
			'position' => 'Position',
			'tickets' => 'Tickets',
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
		$criteria->compare('live_id',$this->live_id);
		$criteria->compare('venue_id',$this->venue_id);
		$criteria->compare('genre_id',$this->genre_id);
		$criteria->compare('starts_at',$this->starts_at,true);
		$criteria->compare('ends_at',$this->ends_at,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('media_id',$this->media_id);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('tickets',$this->tickets,true);
		$criteria->compare('created',$this->created);
		$criteria->compare('updated',$this->updated);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}