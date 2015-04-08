<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $usu_id
 * @property string $usu_rut
 * @property string $usu_nombre1
 * @property string $usu_nombre2
 * @property string $usu_apepat
 * @property string $usu_apemat
 * @property integer $usu_estado
 * @property integer $usu_iduser
 *
 * The followings are the available model relations:
 * @property AAsignatura[] $aAsignaturas
 * @property Curso[] $cursos
 * @property Parametro $usuEstado
 * @property CrugeUser $usuIduser
 */
class Usuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usu_estado, usu_iduser', 'numerical', 'integerOnly'=>true),
			array('usu_rut', 'length', 'max'=>12),
			array('usu_nombre1, usu_nombre2, usu_apepat, usu_apemat', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('usu_id, usu_rut, usu_nombre1, usu_nombre2, usu_apepat, usu_apemat, usu_estado, usu_iduser', 'safe', 'on'=>'search'),
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
			'aAsignaturas' => array(self::HAS_MANY, 'AAsignatura', 'aa_docente'),
			'cursos' => array(self::HAS_MANY, 'Curso', 'cur_pjefe'),
			'usuEstado' => array(self::BELONGS_TO, 'Parametro', 'usu_estado'),
			'usuIduser' => array(self::BELONGS_TO, 'CrugeUser', 'usu_iduser'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'usu_id' => 'ID',
			'usu_rut' => 'Rut',
			'usu_nombre1' => 'Primer Nombre',
			'usu_nombre2' => 'Segundo Nombre',
			'usu_apepat' => 'Apellido Paterno',
			'usu_apemat' => 'Apellido Materno',
			'usu_estado' => 'Estado',
			'usu_iduser' => 'Iduser',
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

		$criteria->compare('usu_id',$this->usu_id);
		$criteria->compare('usu_rut',$this->usu_rut,true);
		$criteria->compare('usu_nombre1',$this->usu_nombre1,true);
		$criteria->compare('usu_nombre2',$this->usu_nombre2,true);
		$criteria->compare('usu_apepat',$this->usu_apepat,true);
		$criteria->compare('usu_apemat',$this->usu_apemat,true);
		$criteria->compare('usu_estado',$this->usu_estado);
		$criteria->compare('usu_iduser',$this->usu_iduser);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getNombreCorto(){
		return $this->usu_nombre1." ".$this->usu_apepat;
	}
}
