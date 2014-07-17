<?php

/**
 * This is the model class for table "images".
 *
 * The followings are the available columns in table 'images':
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property string $description
 * @property integer $album_id
 * @property integer $created
 */
class Images extends PIActiveRecord
{
	public static $IMAGE_BANNER = 1; # Hình cho banner
	public static $IMAGE_PHOTO = 2; # Hình ảnh cho thư viện hình ảnh
	public static $IMAGE_PATNER = 3; # Hình ảnh cho đối tác
	
	public $image;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'images';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, link, created', 'required', 'message'=>'{attribute} Không được trống.'),
			array('created', 'numerical', 'integerOnly'=>true),
			array('image', 'file','types'=>'jpg, gif, png', 'maxSize'=>1024*1024*5, 'allowEmpty'=>false, 'on'=>'insert'),
			array('image', 'file', 'types'=>'jpg, gif, png', 'maxSize'=>1024*1024*5, 'allowEmpty'=>true, 'on'=>'update'),
			//array('name', 'length', 'max'=>255),
			//array('image, description', 'length', 'max'=>500),
			//array('image', 'file', 'types'=>'jpg, gif, png', 'maxSize'=>'300000'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, image, description, album_id, created', 'safe', 'on'=>'search'),
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
			'images' => array(self::BELONGS_TO, 'Albums', 'album_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Tiêu đề',
			'image' => 'Hình ảnh',
			'link' => 'Liên kết',
			'album_id' => 'Loại hình',
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
		$criteria->compare('link',$this->link,true);
		$criteria->compare('album_id',$this->album_id);
		$criteria->compare('created',$this->created);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Images the static model class
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
	public static function countImageByAlbum($albumId =null)
	{
		$sql = "SELECT COUNT(*) as album_id FROM images where album_id=$albumId";
		$albumId = Yii::app()->db->createCommand($sql)->queryScalar();
		return $albumId;
	}
	
	
}
