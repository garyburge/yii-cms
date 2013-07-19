<?php

/**
 * This is the model class for table "article_content".
 *
 * The followings are the available columns in table 'article_content':
 * @property integer $article_id
 * @property integer $content_id
 * @property integer $widget_id
 *
 * The followings are the available model relations:
 * @property Article $article
 * @property Content $content
 * @property Widget $widget
 */
class ArticleContent extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ArticleContent the static model class
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
		return 'article_content';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('article_id, content_id, widget_id', 'required'),
			array('article_id, content_id, widget_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('article_id, content_id, widget_id', 'safe', 'on'=>'search'),
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
			'article' => array(self::BELONGS_TO, 'Article', 'article_id'),
			'content' => array(self::BELONGS_TO, 'Content', 'content_id'),
			'widget' => array(self::BELONGS_TO, 'Widget', 'widget_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'article_id' => 'Article',
			'content_id' => 'Content',
			'widget_id' => 'Widget',
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

		$criteria->compare('article_id',$this->article_id);
		$criteria->compare('content_id',$this->content_id);
		$criteria->compare('widget_id',$this->widget_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}