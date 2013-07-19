<?php

/**
 * This is the model class for table "layout".
 *
 * The followings are the available columns in table 'layout':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $master_layout_id
 * @property string $view_path
 *
 * The followings are the available model relations:
 * @property Column[] $columns
 * @property MasterLayout $masterLayout
 * @property Page[] $pages
 */
class Layout extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Layout the static model class
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
		return 'layout';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, name, master_layout_id, view_path', 'required'),
			array('id, master_layout_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>64),
			array('description, view_path', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, description, master_layout_id, view_path', 'safe', 'on'=>'search'),
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
			'columns' => array(self::HAS_MANY, 'Column', 'layout_id'),
			'masterLayout' => array(self::BELONGS_TO, 'MasterLayout', 'master_layout_id'),
			'pages' => array(self::HAS_MANY, 'Page', 'layout_id'),
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
			'description' => 'Description',
			'master_layout_id' => 'Master Layout',
			'view_path' => 'View Path',
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
		$criteria->compare('description',$this->description,true);
		$criteria->compare('master_layout_id',$this->master_layout_id);
		$criteria->compare('view_path',$this->view_path,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}