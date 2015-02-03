<?php

/**
 * This is the model class for table "curso".
 *
 * The followings are the available columns in table 'curso':
 * @property integer $cur_id
 * @property string $cur_ano
 * @property integer $cur_nivel
 * @property integer $cur_jornada
 * @property integer $cur_letra
 * @property integer $cur_pjefe
 * @property integer $cur_infd
 * @property integer $cur_tperiodo
 * @property integer $cur_notas_periodo
 *
 * The followings are the available model relations:
 * @property AAsignatura[] $aAsignaturas
 * @property Parametro $curNivel
 * @property Parametro $curJornada
 * @property Parametro $curLetra
 * @property CrugeUser $curPjefe
 * @property InformeDesarrollo $curInfd
 * @property Parametro $curTperiodo
 * @property Matricula[] $matriculas
 */
class Curso extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'curso';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cur_ano, cur_notas_periodo', 'required'),
			array('cur_nivel, cur_jornada, cur_letra, cur_pjefe, cur_infd, cur_tperiodo, cur_notas_periodo', 'numerical', 'integerOnly'=>true),
			array('cur_ano', 'length', 'max'=>4),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('cur_id, cur_ano, cur_nivel, cur_jornada, cur_letra, cur_pjefe, cur_infd, cur_tperiodo, cur_notas_periodo', 'safe', 'on'=>'search'),
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
			'aAsignaturas' => array(self::HAS_MANY, 'AAsignatura', 'aa_curso'),
			'curNivel' => array(self::BELONGS_TO, 'Parametro', 'cur_nivel'),
			'curJornada' => array(self::BELONGS_TO, 'Parametro', 'cur_jornada'),
			'curLetra' => array(self::BELONGS_TO, 'Parametro', 'cur_letra'),
			'curPjefe' => array(self::BELONGS_TO, 'CrugeUser', 'cur_pjefe'),
			'curInfd' => array(self::BELONGS_TO, 'InformeDesarrollo', 'cur_infd'),
			'curTperiodo' => array(self::BELONGS_TO, 'Parametro', 'cur_tperiodo'),
			'matriculas' => array(self::HAS_MANY, 'Matricula', 'mat_cur'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cur_id' => 'Cur',
			'cur_ano' => 'Cur Ano',
			'cur_nivel' => 'Cur Nivel',
			'cur_jornada' => 'Cur Jornada',
			'cur_letra' => 'Cur Letra',
			'cur_pjefe' => 'Cur Pjefe',
			'cur_infd' => 'Cur Infd',
			'cur_tperiodo' => 'Cur Tperiodo',
			'cur_notas_periodo' => 'Cur Notas Periodo',
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

		$criteria->compare('cur_id',$this->cur_id);
		$criteria->compare('cur_ano',$this->cur_ano,true);
		$criteria->compare('cur_nivel',$this->cur_nivel);
		$criteria->compare('cur_jornada',$this->cur_jornada);
		$criteria->compare('cur_letra',$this->cur_letra);
		$criteria->compare('cur_pjefe',$this->cur_pjefe);
		$criteria->compare('cur_infd',$this->cur_infd);
		$criteria->compare('cur_tperiodo',$this->cur_tperiodo);
		$criteria->compare('cur_notas_periodo',$this->cur_notas_periodo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Curso the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
