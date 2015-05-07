<?php

/**
 * This is the model class for table "ciudad".
 *
 * The followings are the available columns in table 'ciudad':
 * @property integer $ciu_id
 * @property string $ciu_descripcion
 * @property integer $ciu_reg
 *
 * The followings are the available model relations:
 * @property Alumno[] $alumnos
 * @property Region $ciuReg
 * @property Comuna[] $comunas
 */
class Ciudad extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ciudad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ciu_reg', 'numerical', 'integerOnly'=>true),
			array('ciu_descripcion','required','message'=>'Debe ingresar una ciudad'),
			array('ciu_descripcion','validateText','message'=>'Ingrese una ciudad valida'),
			array('ciu_descripcion', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ciu_id, ciu_descripcion, ciu_reg', 'safe', 'on'=>'search'),
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
			'alumnos' => array(self::HAS_MANY, 'Alumno', 'alum_ciudad'),
			'ciuReg' => array(self::BELONGS_TO, 'Region', 'ciu_reg'),
			'comunas' => array(self::HAS_MANY, 'Comuna', 'com_ciu'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ciu_id' => 'Ciu',
			'ciu_descripcion' => 'Ciu Descripcion',
			'ciu_reg' => 'Ciu Reg',
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

		$criteria->compare('ciu_id',$this->ciu_id);
		$criteria->compare('ciu_descripcion',$this->ciu_descripcion,true);
		$criteria->compare('ciu_reg',$this->ciu_reg);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ciudad the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function validateText($attribute, $params) {
    $pattern = '/^([a-zA-ZñÑÁÉÍÓÚáéíóú]+([[:space:]]{0,2}[a-zA-ZñÑÉÍÓÚáéíóú]+)*)$/';
        if($this->$attribute!=""){	
	        if (!preg_match($pattern, $this->$attribute))
	            $this->addError($attribute,$params['message']);
    	}
	}
}
