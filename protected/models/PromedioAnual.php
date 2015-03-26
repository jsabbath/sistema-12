<?php

/**
 * This is the model class for table "promedio_anual".
 *
 * The followings are the available columns in table 'promedio_anual':
 * @property integer $PRO_ID
 * @property integer $PRO_PROM_1
 * @property integer $PRO_PROM_2
 * @property integer $PRO_PROM_3
 * @property string $PRO_NOMBRE_ASIGNATURA
 *
 * The followings are the available model relations:
 * @property ProMat[] $proMats
 */
class PromedioAnual extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'promedio_anual';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PRO_PROM_1, PRO_PROM_2, PRO_PROM_3', 'numerical', 'integerOnly'=>true),
			array('PRO_NOMBRE_ASIGNATURA', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('PRO_ID, PRO_PROM_1, PRO_PROM_2, PRO_PROM_3, PRO_NOMBRE_ASIGNATURA', 'safe', 'on'=>'search'),
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
			'proMats' => array(self::HAS_MANY, 'ProMat', 'PRO_MAT_ANUAL'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'PRO_ID' => 'Pro',
			'PRO_PROM_1' => 'Pro Prom 1',
			'PRO_PROM_2' => 'Pro Prom 2',
			'PRO_PROM_3' => 'Pro Prom 3',
			'PRO_NOMBRE_ASIGNATURA' => 'Pro Nombre Asignatura',
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

		$criteria->compare('PRO_ID',$this->PRO_ID);
		$criteria->compare('PRO_PROM_1',$this->PRO_PROM_1);
		$criteria->compare('PRO_PROM_2',$this->PRO_PROM_2);
		$criteria->compare('PRO_PROM_3',$this->PRO_PROM_3);
		$criteria->compare('PRO_NOMBRE_ASIGNATURA',$this->PRO_NOMBRE_ASIGNATURA,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PromedioAnual the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
