<?php

/**
 * This is the model class for table "content".
 *
 * The followings are the available columns in table 'content':
 * @property integer $id
 * @property string $title
 * @property string $subtitle
 * @property string $abstract
 * @property string $body
 * @property integer $created
 * @property integer $updated
 * @property integer $published
 * @property string $history
 *
 * The followings are the available model relations:
 * @property ArticleContent[] $articleContents
 * @property AuthorContent[] $authorContents
 * @property ContentMedia[] $contentMedias
 * @property ContentTag[] $contentTags
 */
class Content extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Content the static model class
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
		return 'content';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, body, created', 'required'),
			array('created, updated, published', 'numerical', 'integerOnly'=>true),
			array('title, subtitle', 'length', 'max'=>255),
			array('abstract, history', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, subtitle, abstract, body, created, updated, published, history', 'safe', 'on'=>'search'),
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
			'articleContents' => array(self::HAS_MANY, 'ArticleContent', 'content_id'),
			'authorContents' => array(self::HAS_MANY, 'AuthorContent', 'content_id'),
			'contentMedias' => array(self::HAS_MANY, 'ContentMedia', 'content_id'),
			'contentTags' => array(self::HAS_MANY, 'ContentTag', 'content_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'subtitle' => 'Subtitle',
			'abstract' => 'Abstract',
			'body' => 'Body',
			'created' => 'Created',
			'updated' => 'Updated',
			'published' => 'Published',
			'history' => 'History',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('subtitle',$this->subtitle,true);
		$criteria->compare('abstract',$this->abstract,true);
		$criteria->compare('body',$this->body,true);
		$criteria->compare('created',$this->created);
		$criteria->compare('updated',$this->updated);
		$criteria->compare('published',$this->published);
		$criteria->compare('history',$this->history,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}