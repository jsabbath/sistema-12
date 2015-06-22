<?php

/**
 * This is the model class for table "evento".
 *
 * The followings are the available columns in table 'evento':
 * @property integer $eve_id
 * @property string $eve_descripcion
 * @property string $eve_inicio
 * @property string $eve_fin
 * @property integer $eve_usuario
 *
 * The followings are the available model relations:
 * @property Usuario $eveUsuario
 */
class Evento extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'evento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('eve_usuario', 'numerical', 'integerOnly'=>true),
			array('eve_descripcion', 'length', 'max'=>255),
			array('eve_inicio, eve_fin', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('eve_id, eve_descripcion, eve_inicio, eve_fin, eve_usuario', 'safe', 'on'=>'search'),
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
			'eveUsuario' => array(self::BELONGS_TO, 'Usuario', 'eve_usuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'eve_id' => 'Eve',
			'eve_descripcion' => 'Eve Descripcion',
			'eve_inicio' => 'Eve Inicio',
			'eve_fin' => 'Eve Fin',
			'eve_usuario' => 'Eve Usuario',
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

		$criteria->compare('eve_id',$this->eve_id);
		$criteria->compare('eve_descripcion',$this->eve_descripcion,true);
		$criteria->compare('eve_inicio',$this->eve_inicio,true);
		$criteria->compare('eve_fin',$this->eve_fin,true);
		$criteria->compare('eve_usuario',$this->eve_usuario);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Evento the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
