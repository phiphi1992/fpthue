<?php

/**
 * This is the model class for table "albums".
 *
 * The followings are the available columns in table 'albums':
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property string $description
 * @property integer $created
 */
class Albums extends PIActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'albums';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, alias, created', 'required','message'=>'{attribute} không được trống'	),
			array('created', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('alias, description', 'length', 'max'=>500),
			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, alias, description, created', 'safe', 'on'=>'search'),
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
			'name' => 'Tên',
			'image'=>'Ảnh đại diện',
			'alias' => 'Alias',
			'description' => 'Mô tả',
			'created' => 'Ngày tạo',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('created',$this->created);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Albums the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public static function getImage($image = 'noname.jpg')
	{
		$path = realpath(Yii::app()->basePath.'/../upload/images/'.$image);
		if(file_exists($path) && !empty($image))	return Yii::app()->baseUrl.'/upload/images/'.$image;
		else return Yii::app()->baseUrl.'/upload/images/noname.jpg';
		
	}
	
	public static function getImagePrimary($albumId,$w,$h)
	{
		$image = Images::model()->findByAttributes(array('album_id'=>$albumId,'is_primary'=>1));
		if(!empty($image))
			return getImage($image->image,$w,$h);
		else
			return getImage('',$w,$h);
		
	}
	public function getAlbums()
	{
		$dataProvider=new CActiveDataProvider('Albums', array('criteria'=>array('select'=>'id, name')));
		$arr = $dataProvider->getData();
		$data_Albums = array();
		$data_Albums[] = '-- Chọn danh mục Albums --';
		foreach($arr as $v){
			$data_Albums[$v->id] = $v->name;
		}
		return $data_Albums;
	}
}
