<?php

/**
 * This is the model class for table "eva_hogar".
 *
 * The followings are the available columns in table 'eva_hogar':
 * @property integer $eh_id
 * @property integer $eh_matricula
 * @property integer $eh_curso
 * @property integer $eh_concepto
 * @property integer $eh_eva1
 * @property integer $eh_eva2
 * @property integer $eh_eva3
 *
 * The followings are the available model relations:
 * @property Matricula $ehMatricula
 * @property PreCurso $ehCurso
 * @property InfHogar $ehConcepto
 */
class EvaHogar extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'eva_hogar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('eh_matricula, eh_curso, eh_concepto, eh_eva1, eh_eva2, eh_eva3', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('eh_id, eh_matricula, eh_curso, eh_concepto, eh_eva1, eh_eva2, eh_eva3', 'safe', 'on'=>'search'),
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
			'ehMatricula' => array(self::BELONGS_TO, 'Matricula', 'eh_matricula'),
			'ehCurso' => array(self::BELONGS_TO, 'PreCurso', 'eh_curso'),
			'ehConcepto' => array(self::BELONGS_TO, 'InfHogar', 'eh_concepto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'eh_id' => 'Eh',
			'eh_matricula' => 'Eh Matricula',
			'eh_curso' => 'Eh Curso',
			'eh_concepto' => 'Eh Concepto',
			'eh_eva1' => 'Eh Eva1',
			'eh_eva2' => 'Eh Eva2',
			'eh_eva3' => 'Eh Eva3',
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

		$criteria->compare('eh_id',$this->eh_id);
		$criteria->compare('eh_matricula',$this->eh_matricula);
		$criteria->compare('eh_curso',$this->eh_curso);
		$criteria->compare('eh_concepto',$this->eh_concepto);
		$criteria->compare('eh_eva1',$this->eh_eva1);
		$criteria->compare('eh_eva2',$this->eh_eva2);
		$criteria->compare('eh_eva3',$this->eh_eva3);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EvaHogar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
