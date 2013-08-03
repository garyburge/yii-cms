<?php

/**
 * This is the model class for table "media".
 *
 * The followings are the available columns in table 'media':
 * @property integer $id
 * @property integer $media_type_id
 * @property string $original_file
 * @property string $file
 * @property string $title
 * @property string $caption
 * @property string $attribution
 * @property string $copyright
 * @property integer $height
 * @property integer $width
 * @property integer $size
 * @property integer $created
 * @property integer $updated
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
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('media_type_id, original_file, file, title', 'required'),
			array('media_type_id, height, width, size, created, updated', 'numerical', 'integerOnly'=>true),
			array('original_file, file, title, attribution, copyright', 'length', 'max'=>255),
			array('caption', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, media_type_id, original_file, file, title, caption, attribution, copyright, height, width, size, created, updated', 'safe', 'on'=>'search'),
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
			'media_type_id' => 'Media Type',
			'original_file' => 'Original File',
			'file' => 'File',
			'title' => 'Title',
			'caption' => 'Caption',
			'attribution' => 'Attribution',
			'copyright' => 'Copyright',
			'height' => 'Height',
			'width' => 'Width',
			'size' => 'Size',
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
		$criteria->compare('original_file',$this->original_file,true);
		$criteria->compare('file',$this->file,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('caption',$this->caption,true);
		$criteria->compare('attribution',$this->attribution,true);
		$criteria->compare('copyright',$this->copyright,true);
		$criteria->compare('height',$this->height);
		$criteria->compare('width',$this->width);
		$criteria->compare('size',$this->size);
		$criteria->compare('created',$this->created);
		$criteria->compare('updated',$this->updated);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}