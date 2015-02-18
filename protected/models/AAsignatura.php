<?php

/**
 * This is the model class for table "a_asignatura".
 *
 * The followings are the available columns in table 'a_asignatura':
 * @property integer $aa_id
 * @property integer $aa_docente
 * @property integer $aa_curso
 * @property integer $aa_asignatura
 *
 * The followings are the available model relations:
 * @property Usuario $aaDocente
 * @property Curso $aaCurso
 * @property Asignatura $aaAsignatura
 */
class AAsignatura extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'a_asignatura';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('aa_docente, aa_curso, aa_asignatura', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('aa_id, aa_docente, aa_curso, aa_asignatura', 'safe', 'on'=>'search'),
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
			'aaDocente' => array(self::BELONGS_TO, 'Usuario', 'aa_docente'),
			'aaCurso' => array(self::BELONGS_TO, 'Curso', 'aa_curso'),
			'aaAsignatura' => array(self::BELONGS_TO, 'Asignatura', 'aa_asignatura'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'aa_id' => 'Aa',
			'aa_docente' => 'Aa Docente',
			'aa_curso' => 'Aa Curso',
			'aa_asignatura' => 'Aa Asignatura',
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

		$criteria->compare('aa_id',$this->aa_id);
		$criteria->compare('aa_docente',$this->aa_docente);
		$criteria->compare('aa_curso',$this->aa_curso);
		$criteria->compare('aa_asignatura',$this->aa_asignatura);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AAsignatura the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
