<?php

/**
 * This is the model class for table "concepto_hogar".
 *
 * The followings are the available columns in table 'concepto_hogar':
 * @property integer $ch_id
 * @property string $ch_descripcion
 * @property integer $ch_area_hogar
 *
 * The followings are the available model relations:
 * @property AreaHogar $chAreaHogar
 */
class ConceptoHogar extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'concepto_hogar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ch_area_hogar', 'numerical', 'integerOnly'=>true),
			array('ch_descripcion', 'length', 'max'=>1024),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ch_id, ch_descripcion, ch_area_hogar', 'safe', 'on'=>'search'),
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
			'chAreaHogar' => array(self::BELONGS_TO, 'AreaHogar', 'ch_area_hogar'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ch_id' => 'ID',
			'ch_descripcion' => 'Concepto',
			'ch_area_hogar' => 'Area',
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

		$criteria->compare('ch_id',$this->ch_id);
		$criteria->compare('ch_descripcion',$this->ch_descripcion,true);
		$criteria->compare('ch_area_hogar',$this->ch_area_hogar);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ConceptoHogar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
