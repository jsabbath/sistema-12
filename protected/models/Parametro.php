<?php

/**
 * This is the model class for table "parametro".
 *
 * The followings are the available columns in table 'parametro':
 * @property integer $par_id
 * @property string $par_item
 * @property string $par_descripcion
 *
 * The followings are the available model relations:
 * @property Alumno[] $alumnos
 * @property Curso[] $cursos
 * @property Curso[] $cursos1
 * @property Curso[] $cursos2
 * @property Curso[] $cursos3
 * @property Matricula[] $matriculas
 */
class Parametro extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'parametro';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('par_item, par_descripcion', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('par_id, par_item, par_descripcion', 'safe', 'on'=>'search'),
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
			'alumnos' => array(self::HAS_MANY, 'Alumno', 'alum_genero'),
			'cursos' => array(self::HAS_MANY, 'Curso', 'cur_nivel'),
			'cursos1' => array(self::HAS_MANY, 'Curso', 'cur_letra'),
			'cursos2' => array(self::HAS_MANY, 'Curso', 'cur_jornada'),
			'cursos3' => array(self::HAS_MANY, 'Curso', 'cur_tperiodo'),
			'matriculas' => array(self::HAS_MANY, 'Matricula', 'mat_estado'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'par_id' => 'Par',
			'par_item' => 'Par Item',
			'par_descripcion' => 'Par Descripcion',
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

		$criteria->compare('par_id',$this->par_id);
		$criteria->compare('par_item',$this->par_item,true);
		$criteria->compare('par_descripcion',$this->par_descripcion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Parametro the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
