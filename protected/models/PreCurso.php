<?php

/**
 * This is the model class for table "pre_curso".
 *
 * The followings are the available columns in table 'pre_curso':
 * @property integer $pre_id
 * @property integer $pre_ano
 * @property integer $pre_nivel
 * @property integer $pre_letra
 * @property integer $pre_jornada
 * @property integer $pre_pjefe
 *
 * The followings are the available model relations:
 * @property EvaHogar[] $evaHogars
 * @property Parametro $preNivel
 * @property Parametro $preLetra
 * @property Parametro $preJornada
 * @property Usuario $prePjefe
 */
class PreCurso extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pre_curso';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pre_ano, pre_nivel, pre_letra, pre_jornada, pre_pjefe', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pre_id, pre_ano, pre_nivel, pre_letra, pre_jornada, pre_pjefe', 'safe', 'on'=>'search'),
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
			'evaHogars' => array(self::HAS_MANY, 'EvaHogar', 'eh_curso'),
			'preNivel' => array(self::BELONGS_TO, 'Parametro', 'pre_nivel'),
			'preLetra' => array(self::BELONGS_TO, 'Parametro', 'pre_letra'),
			'preJornada' => array(self::BELONGS_TO, 'Parametro', 'pre_jornada'),
			'prePjefe' => array(self::BELONGS_TO, 'Usuario', 'pre_pjefe'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pre_id' => 'ID',
			'pre_ano' => 'Año',
			'pre_nivel' => 'Nivel',
			'pre_letra' => 'Letra',
			'pre_jornada' => 'Jornada',
			'pre_pjefe' => 'Profesor jefe',
			'pre_inf' => 'Informe Hogar',
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

		$criteria->compare('pre_id',$this->pre_id);
		$criteria->compare('pre_ano',$this->pre_ano);
		$criteria->compare('pre_nivel',$this->pre_nivel);
		$criteria->compare('pre_letra',$this->pre_letra);
		$criteria->compare('pre_jornada',$this->pre_jornada);
		$criteria->compare('pre_pjefe',$this->pre_pjefe);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function buscar($ano)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('pre_ano',$ano);
		$criteria->compare('pre_id',$this->pre_id);
		$criteria->compare('pre_ano',$this->pre_ano);
		$criteria->compare('pre_nivel',$this->pre_nivel);
		$criteria->compare('pre_letra',$this->pre_letra);
		$criteria->compare('pre_jornada',$this->pre_jornada);
		$criteria->compare('pre_pjefe',$this->pre_pjefe);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PreCurso the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getCurso(){
		return $this->preNivel->par_descripcion." ".$this->preLetra->par_descripcion;
	}
}
