<?php

/**
 * This is the model class for table "informations".
 *
 * The followings are the available columns in table 'informations':
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property string $description
 * @property string $content
 * @property string $image
 * @property integer $created
 * @property integer $updated
 */
class Informations extends PIActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'informations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name,description,content, created, updated', 'required', 'message'=>'{attribute} không được trống'),
			array('created, updated', 'numerical', 'integerOnly'=>true),
			//array('image', 'length', 'max'=>255),
			array('name,alias', 'length', 'max'=>500),
			//array('image', 'file', 'types'=>'jpg, gif, png', 'allowEmpty'=>true,),
			array('description, content', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, alias, description, content, created, updated', 'safe', 'on'=>'search'),
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
			'name'=>"Tiêu đề trang",
			'alias' => 'Alias',
			'description' => 'Mô tả ngắn',
			'content' => 'Nội dung',
			'image'=>'Hình ảnh',
			'created' => 'Created',
			'updated' => 'Updated',
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
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('created',$this->created);
		$criteria->compare('updated',$this->updated);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Informations the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
