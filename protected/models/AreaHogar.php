<?php

/**
 * This is the model class for table "area_hogar".
 *
 * The followings are the available columns in table 'area_hogar':
 * @property integer $ah_id
 * @property string $ah_descripcion
 * @property integer $ah_inf_hogar
 *
 * The followings are the available model relations:
 * @property InformeHogar $ahInfHogar
 * @property ConceptoHogar[] $conceptoHogars
 */
class AreaHogar extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'area_hogar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ah_inf_hogar', 'numerical', 'integerOnly'=>true),
			array('ah_descripcion', 'length', 'max'=>512),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ah_id, ah_descripcion, ah_inf_hogar', 'safe', 'on'=>'search'),
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
			'ahInfHogar' => array(self::BELONGS_TO, 'InformeHogar', 'ah_inf_hogar'),
			'conceptoHogars' => array(self::HAS_MANY, 'ConceptoHogar', 'ch_area_hogar'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ah_id' => 'Ah',
			'ah_descripcion' => 'Ah Descripcion',
			'ah_inf_hogar' => 'Ah Inf Hogar',
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

		$criteria->compare('ah_id',$this->ah_id);
		$criteria->compare('ah_descripcion',$this->ah_descripcion,true);
		$criteria->compare('ah_inf_hogar',$this->ah_inf_hogar);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AreaHogar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
