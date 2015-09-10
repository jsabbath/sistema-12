<?php

/**
 * This is the model class for table "notas".
 *
 * The followings are the available columns in table 'notas':
 * @property integer $not_id
 * @property integer $not_periodo
 * @property integer $not_ano
 * @property integer $not_mat
 * @property integer $not_asig
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
 * @property double $not_prom
 *
 * The followings are the available model relations:
 * @property Matricula $notMat
 * @property Asignatura $notAsig
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
			array('not_periodo, not_ano', 'required'),
			array('not_periodo, not_ano, not_mat, not_asig', 'numerical', 'integerOnly'=>true),
			array('not_01, not_02, not_03, not_04, not_05, not_06, not_07, not_08, not_09, not_10, not_11, not_12, not_prom', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('not_id, not_periodo, not_ano, not_mat, not_asig, not_01, not_02, not_03, not_04, not_05, not_06, not_07, not_08, not_09, not_10, not_11, not_12, not_prom', 'safe', 'on'=>'search'),
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
			'notMat' => array(self::BELONGS_TO, 'Matricula', 'not_mat'),
			'notAsig' => array(self::BELONGS_TO, 'Asignatura', 'not_asig'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'not_id' => 'Not',
			'not_periodo' => 'Not Periodo',
			'not_ano' => 'Not Ano',
			'not_mat' => 'Not Mat',
			'not_asig' => 'Not Asig',
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
			'not_prom' => 'Not Prom',
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
		$criteria->compare('not_ano',$this->not_ano);
		$criteria->compare('not_mat',$this->not_mat);
		$criteria->compare('not_asig',$this->not_asig);
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
		$criteria->compare('not_prom',$this->not_prom);

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

	public function getNotas(){
		$notas = array();

		$notas[1] = $this->not_01;
		$notas[2] = $this->not_02;
		$notas[3] = $this->not_03;
		$notas[4] = $this->not_04;
		$notas[5] = $this->not_05;
		$notas[6] = $this->not_06;
		$notas[7] = $this->not_07;
		$notas[8] = $this->not_08;
		$notas[9] = $this->not_09;
		$notas[10] = $this->not_10;
		$notas[11] = $this->not_11;
		$notas[12] = $this->not_12;


		return $notas;
	}
}
