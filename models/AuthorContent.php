<?php

/**
 * This is the model class for table "author_content".
 *
 * The followings are the available columns in table 'author_content':
 * @property integer $author_id
 * @property integer $content_id
 * @property integer $byline_id
 *
 * The followings are the available model relations:
 * @property Author $author
 * @property Content $content
 * @property Byline $byline
 */
class AuthorContent extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AuthorContent the static model class
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
		return 'author_content';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('author_id, content_id, byline_id', 'required'),
			array('author_id, content_id, byline_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('author_id, content_id, byline_id', 'safe', 'on'=>'search'),
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
			'author' => array(self::BELONGS_TO, 'Author', 'author_id'),
			'content' => array(self::BELONGS_TO, 'Content', 'content_id'),
			'byline' => array(self::BELONGS_TO, 'Byline', 'byline_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'author_id' => 'Author',
			'content_id' => 'Content',
			'byline_id' => 'Byline',
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

		$criteria->compare('author_id',$this->author_id);
		$criteria->compare('content_id',$this->content_id);
		$criteria->compare('byline_id',$this->byline_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}