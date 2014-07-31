<?php

/**
 * This is the model class for table "categories_news".
 *
 * The followings are the available columns in table 'categories_news':
 * @property integer $id
 * @property string $alias
 * @property string $name
 * @property integer $created
 */
class CategoriesNews extends PIActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'categories_news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, alias', 'required', 'message'=>'{attribute} không được trống'),
			array('created', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('keyword, description', 'length', 'max'=>1024),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, alias, name, created, keyword, description', 'safe', 'on'=>'search'),
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
			'id' => 'Số thứ tự',
			'alias' => 'Alias',
			'name' => 'Tên danh mục bài viết',
			'keyword' => 'Từ khóa',
			'description' => 'Mô tả từ khóa',
			'created' => 'Ngày đăng',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('keyword',$this->keyword,true);
		$criteria->compare('description',$this->description,true);
		//$criteria->compare('created',$this->created);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CategoriesNews the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function getDataCategories()
	{
		$dataProvider=new CActiveDataProvider('CategoriesNews', array('criteria'=>array('select'=>'id, name')));
		$arr = $dataProvider->getData();
		$data_Categories = array();
		$data_Categories[] = '-- Chọn danh mục tin tức --';
		foreach($arr as $v){
			$data_Categories[$v->id] = $v->name;
		}
		return $data_Categories;
	}
	
	public function getDataCategories1()
	{
		$dataProvider=new CActiveDataProvider('CategoriesNews', array('criteria'=>array('select'=>'id, name')));
		$arr = $dataProvider->getData();
		$data_Categories = array();
		//$data_Categories[] = '-- Chọn danh mục tin tức --';
		$data_Categories[""] = '-- Hiển thị tất cả --';
		foreach($arr as $v){
			$data_Categories[$v->id] = $v->name;
		}
		return $data_Categories;
	}
}
