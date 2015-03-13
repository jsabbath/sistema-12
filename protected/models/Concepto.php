<?php

/**
 * This is the model class for table "concepto".
 *
 * The followings are the available columns in table 'concepto':
 * @property integer $con_id
 * @property string $con_descripcion
 * @property integer $con_area
 *
 * The followings are the available model relations:
 * @property Area $conArea
 * @property Escala[] $escalas
 */
class Concepto extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'concepto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('con_area', 'numerical', 'integerOnly'=>true),
			array('con_descripcion', 'length', 'max'=>1024),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('con_id, con_descripcion, con_area', 'safe', 'on'=>'search'),
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
			'conArea' => array(self::BELONGS_TO, 'Area', 'con_area'),
			'escalas' => array(self::HAS_MANY, 'Escala', 'esc_concepto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'con_id' => 'ID',
			'con_descripcion' => 'Concepto',
			'con_area' => 'Area',
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

		$criteria->compare('con_id',$this->con_id);
		$criteria->compare('con_descripcion',$this->con_descripcion,true);
		$criteria->compare('con_area',$this->con_area);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Concepto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
