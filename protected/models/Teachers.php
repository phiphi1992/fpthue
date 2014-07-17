<?php

/**
 * This is the model class for table "teachers".
 *
 * The followings are the available columns in table 'teachers':
 * @property integer $id
 * @property string $administrators
 * @property string $total
 * @property string $teacher
 * @property string $support
 * @property string $staff
 * @property string $protection
 */
class Teachers extends PIActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'teachers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('administrators, total, teacher, support, staff, protection','required','message'=>'{attribute} không được trống'),
			array('administrators, total, teacher, support, staff, protection', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			//array('image1','image2', 'file', 'types'=>'jpg, gif, png', 'maxSize'=>'300000', 'allowEmpty'=>true),
			array('id, administrators, total, teacher, support, staff, protection,image1,image2', 'safe', 'on'=>'search'),
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
			'administrators' => 'Ban giám hiệu',
			'total' => 'Gồm',
			'teacher' => 'Giáo viên',
			'support' => 'Cấp dưỡng',
			'staff' => 'Nhân viên tạp vụ',
			'protection' => 'Bảo vệ',
			'image1'=>'Hình 1',
			'image2'=>'Hình 2',
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
		$criteria->compare('administrators',$this->administrators,true);
		$criteria->compare('total',$this->total,true);
		$criteria->compare('teacher',$this->teacher,true);
		$criteria->compare('support',$this->support,true);
		$criteria->compare('staff',$this->staff,true);
		$criteria->compare('protection',$this->protection,true);
		$criteria->compare('image1',$this->image1,true);
		$criteria->compare('image2',$this->image2,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Teachers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
