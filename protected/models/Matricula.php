<?php

/**
 * This is the model class for table "matricula".
 *
 * The followings are the available columns in table 'matricula':
 * @property integer $mat_id
 * @property integer $mat_ano
 * @property string $mat_numero
 * @property string $mat_fingreso
 * @property string $mat_fretiro
 * @property string $mat_fcambio
 * @property integer $mat_asistencia_1
 * @property integer $mat_asistencia_2
 * @property integer $mat_asistencia_3
 * @property integer $mat_alu_id
 * @property integer $mat_estado
 *
 * The followings are the available model relations:
 * @property Evaluacion[] $evaluacions
 * @property Parametro $matEstado
 * @property Alumno $matAlu
 * @property Notas[] $notases
 * @property ProMat[] $proMats
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
	public $alumno_nombres;
	public $alumno_apepat;
	public $alumno_apemat;
	public $estado;


	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mat_ano, mat_asistencia_1, mat_asistencia_2, mat_asistencia_3, mat_alu_id, mat_estado', 'numerical', 'integerOnly'=>true),
			array('mat_numero', 'length', 'max'=>11),
			array('mat_fingreso, mat_fretiro, mat_fcambio', 'safe'),
			array('alumno_nombres','safe'),
			array('alumno_apepat','safe'),
			array('alumno_apemat','safe'),
			array('estado','safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('mat_id, mat_ano, mat_numero, mat_fingreso, mat_fretiro, mat_fcambio, mat_asistencia_1, mat_asistencia_2, mat_asistencia_3, mat_alu_id, mat_estado', 'safe', 'on'=>'search'),
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
			'evaluacions' => array(self::HAS_MANY, 'Evaluacion', 'eva_matricula'),
			'matEstado' => array(self::BELONGS_TO, 'Parametro', 'mat_estado'),
			'matAlu' => array(self::BELONGS_TO, 'Alumno', 'mat_alu_id'),
			'notases' => array(self::HAS_MANY, 'Notas', 'not_mat'),
			'proMats' => array(self::HAS_MANY, 'ProMat', 'PRO_MATRI'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'mat_id' => 'ID',
			'mat_ano' => 'Ano',
			'mat_numero' => 'Numero Matricula',
			'mat_fingreso' => 'Fecha Ingreso',
			'mat_fretiro' => 'Fecha Retiro',
			'mat_fcambio' => 'Fecha Cambio',
			'mat_asistencia_1' => 'Asistencia 1',
			'mat_asistencia_2' => 'Asistencia 2',
			'mat_asistencia_3' => 'Asistencia 3',
			'mat_alu_id' => 'Alumno',
			'mat_estado' => 'Estado',
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
		$criteria->compare('mat_ano',$this->mat_ano);
		$criteria->compare('mat_numero',$this->mat_numero,true);
		$criteria->compare('mat_fingreso',$this->mat_fingreso,true);
		$criteria->compare('mat_fretiro',$this->mat_fretiro,true);
		$criteria->compare('mat_fcambio',$this->mat_fcambio,true);
		$criteria->compare('mat_asistencia_1',$this->mat_asistencia_1);
		$criteria->compare('mat_asistencia_2',$this->mat_asistencia_2);
		$criteria->compare('mat_asistencia_3',$this->mat_asistencia_3);
		$criteria->compare('mat_alu_id',$this->mat_alu_id);
		$criteria->compare('mat_estado',$this->mat_estado);
		$criteria->with = array('matAlu','matEstado');
        $criteria->addSearchCondition('matAlu.alum_nombres', $this->alumno_nombres);
        $criteria->addSearchCondition('matAlu.alum_apepat', $this->alumno_apepat);
        $criteria->addSearchCondition('matAlu.alum_apemat', $this->alumno_apemat);
        $criteria->addSearchCondition('matEstado.par_descripcion', $this->estado);

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
