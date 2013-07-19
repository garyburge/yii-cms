<?php

/**
 * This is the model class for table "column".
 *
 * The followings are the available columns in table 'column':
 * @property integer $id
 * @property integer $layout_id
 * @property string $name
 * @property integer $order
 * @property string $class
 *
 * The followings are the available model relations:
 * @property Layout $layout
 * @property ColumnWidget[] $columnWidgets
 */
class Column extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Column the static model class
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
		return 'column';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, layout_id, name, class', 'required'),
			array('id, layout_id, order', 'numerical', 'integerOnly'=>true),
			array('name, class', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, layout_id, name, order, class', 'safe', 'on'=>'search'),
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
			'layout' => array(self::BELONGS_TO, 'Layout', 'layout_id'),
			'columnWidgets' => array(self::HAS_MANY, 'ColumnWidget', 'column_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'layout_id' => 'Layout',
			'name' => 'Name',
			'order' => 'Order',
			'class' => 'Class',
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
		$criteria->compare('layout_id',$this->layout_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('order',$this->order);
		$criteria->compare('class',$this->class,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}