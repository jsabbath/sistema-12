<?php

/**
 * This is the model class for table "informe_desarrollo".
 *
 * The followings are the available columns in table 'informe_desarrollo':
 * @property integer $id_id
 * @property string $id_descripcion
 *
 * The followings are the available model relations:
 * @property Area[] $areas
 * @property Curso[] $cursos
 */
class InformeDesarrollo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'informe_desarrollo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_descripcion', 'length', 'max'=>20),
			array('id_descripcion','required','message'=>'Debe ingresar un nombre'),
			array('id_descripcion','required'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_id, id_descripcion', 'safe', 'on'=>'search'),
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
			'areas' => array(self::HAS_MANY, 'Area', 'are_infd'),
			'cursos' => array(self::HAS_MANY, 'Curso', 'cur_infd'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_id' => 'ID',
			'id_descripcion' => 'Nombre de informe',
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

		$criteria->compare('id_id',$this->id_id);
		$criteria->compare('id_descripcion',$this->id_descripcion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return InformeDesarrollo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
