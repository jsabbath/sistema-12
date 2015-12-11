<?php

/**
 * This is the model class for table "curso".
 *
 * The followings are the available columns in table 'curso':
 * @property integer $cur_id
 * @property integer $cur_ano
 * @property integer $cur_notas_periodo
 * @property integer $cur_nivel
 * @property integer $cur_letra
 * @property integer $cur_jornada
 * @property integer $cur_pjefe
 * @property integer $cur_tperiodo
 *
 * The followings are the available model relations:
 * @property AAsignatura[] $aAsignaturas
 * @property Parametro $curNivel
 * @property Parametro $curLetra
 * @property Parametro $curJornada
 * @property Usuario $curPjefe
 * @property Parametro $curTperiodo
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
			array('cur_jornada','required','message'=>'Debe seleccionar una jornada'),
			array('cur_nivel','required','message'=>'Debe seleccionar un nivel'),
			array('cur_letra','required','message'=>'Debe seleccionar una letra'),
			array('cur_pjefe','required','message'=>'Debe seleccionar un profesor'),
			//array('cur_tperiodo','required','message'=>'Debe seleccionar un tipo de periodo'),
			array('cur_notas_periodo','required','message'=>'Debe especificar el numero de notas'),
			array('cur_infd','required','message'=>'Debe seleccionar un informe de desarrollo'),

			array('cur_notas_periodo','numerical'),
			array('cur_ano,cur_infd, cur_notas_periodo, cur_nivel, cur_letra, numero_plan_programa, ano_plan_programa, cur_jornada, cur_pjefe', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('cur_id, cur_ano, cur_notas_periodo, cur_nivel, cur_letra, cur_jornada, cur_pjefe', 'safe', 'on'=>'search'),
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
			'curLetra' => array(self::BELONGS_TO, 'Parametro', 'cur_letra'),
			'curJornada' => array(self::BELONGS_TO, 'Parametro', 'cur_jornada'),
			'curPjefe' => array(self::BELONGS_TO, 'Usuario', 'cur_pjefe'),
			'curInfd' => array(self::BELONGS_TO, 'informeDesarrollo', 'cur_infd'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cur_id' => 'ID',
			'cur_ano' => 'Año',
			'cur_notas_periodo' => 'Notas Periodo',
			'cur_nivel' => 'Nivel',
			'cur_letra' => 'Letra',
			'cur_jornada' => 'Jornada',
			'cur_pjefe' => 'Profesor Jefe',
			'cur_infd' => 'Informe Desarrollo',
			'numero_plan_programa' => 'Numero Plan y Programa de Estudios',
			'ano_plan_programa' => 'Año Plan y Programa de Estudios',
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
		$criteria->compare('cur_ano',$this->cur_ano);
		$criteria->compare('cur_notas_periodo',$this->cur_notas_periodo);
		$criteria->compare('cur_nivel',$this->cur_nivel);
		$criteria->compare('cur_letra',$this->cur_letra);
		$criteria->compare('cur_jornada',$this->cur_jornada);
		$criteria->compare('cur_pjefe',$this->cur_pjefe);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function buscar($ano)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('cur_ano',$ano);
		$criteria->compare('cur_id',$this->cur_id);
		$criteria->compare('cur_ano',$this->cur_ano);
		$criteria->compare('cur_notas_periodo',$this->cur_notas_periodo);
		$criteria->compare('cur_nivel',$this->cur_nivel);
		$criteria->compare('cur_letra',$this->cur_letra);
		$criteria->compare('cur_jornada',$this->cur_jornada);
		$criteria->compare('cur_pjefe',$this->cur_pjefe);

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

	public function getCurso(){
		return $this->curNivel->par_descripcion." ".$this->curLetra->par_descripcion;
	}

	public function getNombrecurso(){
		$nivel = $this->curNivel->par_descripcion;
		switch ($nivel) {
			case '1º':
				return 'Primer año '.$this->curLetra->par_descripcion;
				break;

			case '2º':
				return 'Segundo año'.$this->curLetra->par_descripcion;
				break;

			case '3º':
				return 'Tercer año '.$this->curLetra->par_descripcion;
				break;

			case '4º':
				return 'Cuarto año'.$this->curLetra->par_descripcion;
				break;

			case '5º':
				return 'Quinto año'.$this->curLetra->par_descripcion;
				break;
			
			case '6º':
				return 'Sexto año'.$this->curLetra->par_descripcion;
				break;

			case '7º':
				return 'Septimo año'.$this->curLetra->par_descripcion;
				break;

			case '8º':
				return 'Octavo año'.$this->curLetra->par_descripcion;
				break;

			default:
				return 'No tiene curso';
				break;
		}
	}
}
