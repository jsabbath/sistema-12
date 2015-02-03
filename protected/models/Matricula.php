<?php

/**
 * This is the model class for table "matricula".
 *
 * The followings are the available columns in table 'matricula':
 * @property integer $mat_id
 * @property string $mat_ano
 * @property integer $mat_cur
 * @property integer $mat_alu_id
 * @property string $mat_fingreso
 * @property string $mat_fretiro
 * @property string $mat_fcambio
 * @property integer $mat_numero
 *
 * The followings are the available model relations:
 * @property Curso $matCur
 * @property Alumno $matAlu
 */
class Matricula extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'matricula';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mat_ano', 'required'),
			array('mat_cur, mat_alu_id, mat_numero', 'numerical', 'integerOnly'=>true),
			array('mat_ano', 'length', 'max'=>4),
			array('mat_fingreso, mat_fretiro, mat_fcambio', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('mat_id, mat_ano, mat_cur, mat_alu_id, mat_fingreso, mat_fretiro, mat_fcambio, mat_numero', 'safe', 'on'=>'search'),
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
			'matCur' => array(self::BELONGS_TO, 'Curso', 'mat_cur'),
			'matAlu' => array(self::BELONGS_TO, 'Alumno', 'mat_alu_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'mat_id' => 'Mat',
			'mat_ano' => 'Mat Ano',
			'mat_cur' => 'Mat Cur',
			'mat_alu_id' => 'Mat Alu',
			'mat_fingreso' => 'Mat Fingreso',
			'mat_fretiro' => 'Mat Fretiro',
			'mat_fcambio' => 'Mat Fcambio',
			'mat_numero' => 'Mat Numero',
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

		$criteria->compare('mat_id',$this->mat_id);
		$criteria->compare('mat_ano',$this->mat_ano,true);
		$criteria->compare('mat_cur',$this->mat_cur);
		$criteria->compare('mat_alu_id',$this->mat_alu_id);
		$criteria->compare('mat_fingreso',$this->mat_fingreso,true);
		$criteria->compare('mat_fretiro',$this->mat_fretiro,true);
		$criteria->compare('mat_fcambio',$this->mat_fcambio,true);
		$criteria->compare('mat_numero',$this->mat_numero);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Matricula the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
