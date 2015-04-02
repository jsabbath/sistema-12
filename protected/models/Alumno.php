<?php

/**
 * This is the model class for table "alumno".
 *
 * The followings are the available columns in table 'alumno':
 * @property integer $alum_id
 * @property string $alum_rut
 * @property string $alum_nombres
 * @property string $alum_apepat
 * @property string $alum_apemat
 * @property string $alum_direccion
 * @property integer $alum_comuna
 * @property integer $alum_ciudad
 * @property integer $alum_region
 * @property integer $alum_genero
 * @property string $alum_f_nac
 * @property string $alum_salud
 * @property string $alum_obs
 *
 * The followings are the available model relations:
 * @property Comuna $alumComuna
 * @property Ciudad $alumCiudad
 * @property Region $alumRegion
 * @property Parametro $alumGenero
 * @property Matricula[] $matriculas
 */
class Alumno extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'alumno';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('alum_comuna, alum_ciudad, alum_region, alum_genero', 'numerical', 'integerOnly'=>true),
			array('alum_rut', 'length', 'max'=>12),
			array('alum_nombres', 'length', 'max'=>100),
			array('alum_apepat, alum_apemat', 'length', 'max'=>20),
			array('alum_direccion', 'length', 'max'=>255),
			array('alum_f_nac, alum_salud, alum_obs', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('alum_id, alum_rut, alum_nombres, alum_apepat, alum_apemat, alum_direccion, alum_comuna, alum_ciudad, alum_region, alum_genero, alum_f_nac, alum_salud, alum_obs', 'safe', 'on'=>'search'),
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
			'alumComuna' => array(self::BELONGS_TO, 'Comuna', 'alum_comuna'),
			'alumCiudad' => array(self::BELONGS_TO, 'Ciudad', 'alum_ciudad'),
			'alumRegion' => array(self::BELONGS_TO, 'Region', 'alum_region'),
			'alumGenero' => array(self::BELONGS_TO, 'Parametro', 'alum_genero'),
			'matriculas' => array(self::HAS_ONE, 'Matricula', 'mat_alu_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'alum_id' => 'ID',
			'alum_rut' => 'Rut',
			'alum_nombres' => 'Nombres',
			'alum_apepat' => 'Apellido Paterno',
			'alum_apemat' => 'Apellido Materno',
			'alum_direccion' => 'Direccion',
			'alum_comuna' => 'Comuna',
			'alum_ciudad' => 'Ciudad',
			'alum_region' => 'Region',
			'alum_genero' => 'Genero',
			'alum_f_nac' => 'Fecha Nacimiento',
			'alum_salud' => 'Salud',
			'alum_obs' => 'Observacion',
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

		$criteria->compare('alum_id',$this->alum_id);
		$criteria->compare('alum_rut',$this->alum_rut,true);
		$criteria->compare('alum_nombres',$this->alum_nombres,true);
		$criteria->compare('alum_apepat',$this->alum_apepat,true);
		$criteria->compare('alum_apemat',$this->alum_apemat,true);
		$criteria->compare('alum_direccion',$this->alum_direccion,true);
		$criteria->compare('alum_comuna',$this->alum_comuna);
		$criteria->compare('alum_ciudad',$this->alum_ciudad);
		$criteria->compare('alum_region',$this->alum_region);
		$criteria->compare('alum_genero',$this->alum_genero);
		$criteria->compare('alum_f_nac',$this->alum_f_nac,true);
		$criteria->compare('alum_salud',$this->alum_salud,true);
		$criteria->compare('alum_obs',$this->alum_obs,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Alumno the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getNombre_completo(){
		return $this->alum_nombres." ".$this->alum_apepat;
	}
}
