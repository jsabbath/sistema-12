<?php

/**
 * This is the model class for table "escala".
 *
 * The followings are the available columns in table 'escala':
 * @property integer $esc_id
 * @property string $esc_descripcion
 * @property integer $esc_concepto
 *
 * The followings are the available model relations:
 * @property Concepto $escConcepto
 */
class Escala extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'escala';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('esc_concepto', 'numerical', 'integerOnly'=>true),
			array('esc_descripcion', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('esc_id, esc_descripcion, esc_concepto', 'safe', 'on'=>'search'),
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
			'escConcepto' => array(self::BELONGS_TO, 'Concepto', 'esc_concepto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'esc_id' => 'ID',
			'esc_descripcion' => 'Escala',
			'esc_concepto' => 'Concepto',
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

		$criteria->compare('esc_id',$this->esc_id);
		$criteria->compare('esc_descripcion',$this->esc_descripcion,true);
		$criteria->compare('esc_concepto',$this->esc_concepto);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Escala the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
