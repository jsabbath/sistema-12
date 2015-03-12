<?php

/**
 * This is the model class for table "notas".
 *
 * The followings are the available columns in table 'notas':
 * @property integer $not_id
 * @property integer $not_aa
 * @property double $not_01
 * @property double $not_02
 * @property double $not_03
 * @property double $not_04
 * @property double $not_05
 * @property double $not_06
 * @property double $not_07
 * @property double $not_08
 * @property double $not_09
 * @property double $not_10
 * @property double $not_11
 * @property double $not_12
 * @property double $not_13
 * @property double $not_14
 * @property double $not_15
 * @property double $not_16
 * @property double $not_17
 * @property double $not_18
 * @property double $not_19
 * @property double $not_20
 * @property double $not_21
 * @property double $not_22
 * @property double $not_23
 * @property double $not_24
 * @property double $not_25
 * @property double $not_26
 * @property double $not_27
 * @property double $not_28
 * @property double $not_29
 * @property double $not_30
 *
 * The followings are the available model relations:
 * @property AAsignatura $notAa
 */
class Notas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'notas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('not_aa, not_periodo', 'numerical', 'integerOnly'=>true),
			array('not_ano', 'length', 'max'=>4),
			array('not_01, not_02, not_03, not_04, not_05, not_06, not_07, not_08, not_09, not_10, not_11, not_12, not_13, not_14, not_15, not_16, not_17, not_18, not_19, not_20, not_21, not_22, not_23, not_24, not_25, not_26, not_27, not_28, not_29, not_30', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('not_id, not_aa, not_01, not_02, not_03, not_04, not_05, not_06, not_07, not_08, not_09, not_10, not_11, not_12, not_13, not_14, not_15, not_16, not_17, not_18, not_19, not_20, not_21, not_22, not_23, not_24, not_25, not_26, not_27, not_28, not_29, not_30', 'safe', 'on'=>'search'),
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
			'notAa' => array(self::BELONGS_TO, 'AAsignatura', 'not_aa'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'not_id' => 'Not',
			'not_aa' => 'Not Aa',
			'not_ano' => 'Not Ano',
			'not_periodo' => 'Not Periodo',
			'not_01' => 'Not 01',
			'not_02' => 'Not 02',
			'not_03' => 'Not 03',
			'not_04' => 'Not 04',
			'not_05' => 'Not 05',
			'not_06' => 'Not 06',
			'not_07' => 'Not 07',
			'not_08' => 'Not 08',
			'not_09' => 'Not 09',
			'not_10' => 'Not 10',
			'not_11' => 'Not 11',
			'not_12' => 'Not 12',
			'not_13' => 'Not 13',
			'not_14' => 'Not 14',
			'not_15' => 'Not 15',
			'not_16' => 'Not 16',
			'not_17' => 'Not 17',
			'not_18' => 'Not 18',
			'not_19' => 'Not 19',
			'not_20' => 'Not 20',
			'not_21' => 'Not 21',
			'not_22' => 'Not 22',
			'not_23' => 'Not 23',
			'not_24' => 'Not 24',
			'not_25' => 'Not 25',
			'not_26' => 'Not 26',
			'not_27' => 'Not 27',
			'not_28' => 'Not 28',
			'not_29' => 'Not 29',
			'not_30' => 'Not 30',
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

		$criteria->compare('not_id',$this->not_id);
		$criteria->compare('not_periodo',$this->not_periodo);		
		$criteria->compare('not_aa',$this->not_aa);
		$criteria->compare('not_ano',$this->not_ano);
		$criteria->compare('not_01',$this->not_01);
		$criteria->compare('not_02',$this->not_02);
		$criteria->compare('not_03',$this->not_03);
		$criteria->compare('not_04',$this->not_04);
		$criteria->compare('not_05',$this->not_05);
		$criteria->compare('not_06',$this->not_06);
		$criteria->compare('not_07',$this->not_07);
		$criteria->compare('not_08',$this->not_08);
		$criteria->compare('not_09',$this->not_09);
		$criteria->compare('not_10',$this->not_10);
		$criteria->compare('not_11',$this->not_11);
		$criteria->compare('not_12',$this->not_12);
		$criteria->compare('not_13',$this->not_13);
		$criteria->compare('not_14',$this->not_14);
		$criteria->compare('not_15',$this->not_15);
		$criteria->compare('not_16',$this->not_16);
		$criteria->compare('not_17',$this->not_17);
		$criteria->compare('not_18',$this->not_18);
		$criteria->compare('not_19',$this->not_19);
		$criteria->compare('not_20',$this->not_20);
		$criteria->compare('not_21',$this->not_21);
		$criteria->compare('not_22',$this->not_22);
		$criteria->compare('not_23',$this->not_23);
		$criteria->compare('not_24',$this->not_24);
		$criteria->compare('not_25',$this->not_25);
		$criteria->compare('not_26',$this->not_26);
		$criteria->compare('not_27',$this->not_27);
		$criteria->compare('not_28',$this->not_28);
		$criteria->compare('not_29',$this->not_29);
		$criteria->compare('not_30',$this->not_30);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Notas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
