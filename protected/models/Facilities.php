<?php

/**
 * This is the model class for table "facilities".
 *
 * The followings are the available columns in table 'facilities':
 * @property integer $id
 * @property string $image1
 * @property string $title1
 * @property string $content1
 * @property string $content2
 * @property string $image2
 * @property string $title2
 * @property string $content3
 * @property string $content4
 * @property string $image3
 * @property string $title3
 * @property string $content5
 * @property string $content6
 */
class Facilities extends PIActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'facilities';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title1, content1, content2,  title2, content3, content4, title3, content5, content6', 'required','message'=>'{attribute} không được trống'),
			array('title1, content1, content2,  title2, content3, content4,  title3, content5, content6', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, image1, title1, content1, content2, image2, title2, content3, content4, image3, title3, content5, content6', 'safe', 'on'=>'search'),
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
			'image1' => 'Hình 1',
			'title1' => 'Tiêu đề 1',
			'content1' => 'Nội dung 1',
			'content2' => 'Nội dung 2',
			'image2' => 'Hình 2',
			'title2' => 'Tiêu đề 2',
			'content3' => 'Số phòng',
			'content4' => 'Số sân chơi',
			'image3' => 'Hình 3',
			'title3' => 'Tiêu đề 3',
			'content5' => 'Số phòng',
			'content6' => 'Số sân chơi',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('image1',$this->image1,true);
		$criteria->compare('title1',$this->title1,true);
		$criteria->compare('content1',$this->content1,true);
		$criteria->compare('content2',$this->content2,true);
		$criteria->compare('image2',$this->image2,true);
		$criteria->compare('title2',$this->title2,true);
		$criteria->compare('content3',$this->content3,true);
		$criteria->compare('content4',$this->content4,true);
		$criteria->compare('image3',$this->image3,true);
		$criteria->compare('title3',$this->title3,true);
		$criteria->compare('content5',$this->content5,true);
		$criteria->compare('content6',$this->content6,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Facilities the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
