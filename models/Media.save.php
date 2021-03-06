<?php

/**
 * This is the model class for table "media".
 *
 * The followings are the available columns in table 'media':
 * @property integer $id
 * @property integer $media_type_id
 * @property string $original_file_name
 * @property string $file_name
 * @property string $title
 * @property string $caption
 * @property string $attribution
 * @property string $copyright
 * @property integer $height
 * @property integer $width
 * @property integer $created
 * @property integer $updated
 *
 * The followings are the available model relations:
 * @property Author[] $authors
 * @property ContentMedia[] $contentMedias
 * @property Venue[] $venues
 */
class Media extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Media the static model class
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
		return 'media';
	}

    /**
     * Set time columns
     * @return array array of rule definitions
     */
    public function behaviors()
    {
        return array(
            'CTimestampBehavior'=>array(
                'class'=>'zii.behaviors.CTimestampBehavior',
                'timestampExpression'=>'time()',
                'createAttribute'=>'created',
                'updateAttribute'=>'updated',
            )
        );
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('original_file_name, file_name, title, caption, copyright', 'filter', 'filter'=>'trim'),
			array('id, media_type_id, file, created', 'required'),
			array('id, media_type_id, height, width, created, updated', 'numerical', 'integerOnly'=>true),
			array('original_file_name, file_name, attribution, copyright, length', 'max'=>255),
			array('title', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, media_type_id, file, title, caption, attribution, copyright, height, width, created, updated', 'safe', 'on'=>'search'),
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
			'authors' => array(self::HAS_MANY, 'Author', 'media_id'),
			'contentMedias' => array(self::HAS_MANY, 'ContentMedia', 'media_id'),
			'venues' => array(self::HAS_MANY, 'Venue', 'media_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'media_type_id' => 'Media Type',
			'file' => 'File',
			'title' => 'Title',
			'caption' => 'Caption',
			'attribution' => 'Attribution',
			'copyright' => 'Copyright',
			'height' => 'Height',
			'width' => 'Width',
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
		$criteria->compare('media_type_id',$this->media_type_id);
		$criteria->compare('file',$this->file,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('caption',$this->caption,true);
		$criteria->compare('attribution',$this->attribution,true);
		$criteria->compare('copyright',$this->copyright);
		$criteria->compare('height',$this->height);
		$criteria->compare('width',$this->width);
		$criteria->compare('created',$this->created);
		$criteria->compare('updated',$this->updated);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}