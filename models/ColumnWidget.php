<?php

/**
 * This is the model class for table "column_widget".
 *
 * The followings are the available columns in table 'column_widget':
 * @property integer $column_id
 * @property integer $widget_id
 *
 * The followings are the available model relations:
 * @property Column $column
 * @property Widget $widget
 */
class ColumnWidget extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ColumnWidget the static model class
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
		return 'column_widget';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('column_id, widget_id', 'required'),
			array('column_id, widget_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('column_id, widget_id', 'safe', 'on'=>'search'),
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
			'column' => array(self::BELONGS_TO, 'Column', 'column_id'),
			'widget' => array(self::BELONGS_TO, 'Widget', 'widget_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'column_id' => 'Column',
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

		$criteria->compare('column_id',$this->column_id);
		$criteria->compare('widget_id',$this->widget_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}