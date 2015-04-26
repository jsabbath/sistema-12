<?php

/**
 * This is the model class for table "evaluacion".
 *
 * The followings are the available columns in table 'evaluacion':
 * @property integer $eva_id
 * @property integer $eva_concepto
 * @property integer $eva_matricula
 * @property integer $eva_ano
 * @property string $eva_nota
 *
 * The followings are the available model relations:
 * @property Concepto $evaConcepto
 * @property Matricula $evaMatricula
 */
class Evaluacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'evaluacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('eva_concepto, eva_matricula, eva_ano', 'numerical', 'integerOnly'=>true),
			array('eva_nota', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('eva_id, eva_concepto, eva_matricula, eva_ano, eva_nota', 'safe', 'on'=>'search'),
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
			'evaConcepto' => array(self::BELONGS_TO, 'Concepto', 'eva_concepto'),
			'evaMatricula' => array(self::BELONGS_TO, 'Matricula', 'eva_matricula'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'eva_id' => 'Eva',
			'eva_concepto' => 'Eva Concepto',
			'eva_matricula' => 'Eva Matricula',
			'eva_ano' => 'Eva Ano',
			'eva_nota' => 'Eva Nota',
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

		$criteria->compare('eva_id',$this->eva_id);
		$criteria->compare('eva_concepto',$this->eva_concepto);
		$criteria->compare('eva_matricula',$this->eva_matricula);
		$criteria->compare('eva_ano',$this->eva_ano);
		$criteria->compare('eva_nota',$this->eva_nota,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Evaluacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
