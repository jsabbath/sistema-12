<?php

/**
 * This is the model class for table "inf_hogar".
 *
 * The followings are the available columns in table 'inf_hogar':
 * @property integer $ih_id
 * @property string $ih_informe
 * @property string $ih_area
 * @property string $ih_concepto
 *
 * The followings are the available model relations:
 * @property EvaHogar[] $evaHogars
 */
class InfHogar extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'inf_hogar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ih_informe', 'length', 'max'=>50),
			array('ih_area', 'length', 'max'=>255),
			array('ih_concepto', 'length', 'max'=>1024),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ih_id, ih_informe, ih_area, ih_concepto', 'safe', 'on'=>'search'),
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
			'evaHogars' => array(self::HAS_MANY, 'EvaHogar', 'eh_concepto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ih_id' => 'ID',
			'ih_informe' => 'Informe',
			'ih_area' => 'Area',
			'ih_concepto' => 'Concepto',
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

		$criteria->compare('ih_id',$this->ih_id);
		$criteria->compare('ih_informe',$this->ih_informe,true);
		$criteria->compare('ih_area',$this->ih_area,true);
		$criteria->compare('ih_concepto',$this->ih_concepto,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return InfHogar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
