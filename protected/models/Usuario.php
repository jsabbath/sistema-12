<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $usu_id
 * @property string $usu_nombres
 * @property string $usu_apepat
 * @property string $usu_apemat
 * @property integer $usu_rut
 * @property string $usu_clave
 * @property integer $usu_cargo
 * @property integer $usu_estado
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
			array('usu_nombres, usu_apepat, usu_apemat, usu_rut, usu_clave, usu_cargo, usu_estado', 'required'),
			array('usu_rut, usu_cargo, usu_estado', 'numerical', 'integerOnly'=>true),
			array('usu_nombres', 'length', 'max'=>100),
			array('usu_apepat, usu_apemat', 'length', 'max'=>30),
			array('usu_clave', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('usu_id, usu_nombres, usu_apepat, usu_apemat, usu_rut, usu_clave, usu_cargo, usu_estado', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'usu_id' => 'Usu',
			'usu_nombres' => 'Usu Nombres',
			'usu_apepat' => 'Usu Apepat',
			'usu_apemat' => 'Usu Apemat',
			'usu_rut' => 'Usu Rut',
			'usu_clave' => 'Usu Clave',
			'usu_cargo' => 'Usu Cargo',
			'usu_estado' => 'Usu Estado',
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
		$criteria->compare('usu_nombres',$this->usu_nombres,true);
		$criteria->compare('usu_apepat',$this->usu_apepat,true);
		$criteria->compare('usu_apemat',$this->usu_apemat,true);
		$criteria->compare('usu_rut',$this->usu_rut);
		$criteria->compare('usu_clave',$this->usu_clave,true);
		$criteria->compare('usu_cargo',$this->usu_cargo);
		$criteria->compare('usu_estado',$this->usu_estado);

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
}
