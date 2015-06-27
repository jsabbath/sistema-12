<?php

/**
 * This is the model class for table "noticia".
 *
 * The followings are the available columns in table 'noticia':
 * @property integer $not_id
 * @property integer $not_user
 * @property string $not_fecha
 * @property string $not_titulo
 * @property string $not_texto
 * @property string $not_programa
 * @property string $not_responsable
 *
 * The followings are the available model relations:
 * @property CrugeUser $notUser
 */
class Noticia extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'noticia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('not_titulo', 'required','message'=>'Debe ingresar un titulo'),
			array('not_programa','required','message'=>'Debe seleccionar un programa'),
			array('not_fecha','required','message'=>'Debe ingresar una fecha'),
			array('not_responsable','required','message'=>'Debe ingresar un responsable'),
			array('not_user', 'numerical', 'integerOnly'=>true),
			array('not_titulo', 'length', 'max'=>50),
			array('not_fecha, not_texto, not_programa, not_responsable', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('not_id, not_user, not_fecha, not_titulo, not_texto, not_programa, not_responsable', 'safe', 'on'=>'search'),
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
			'notUser' => array(self::BELONGS_TO, 'CrugeUser', 'not_user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'not_id' => 'ID',
			'not_user' => 'Usuario',
			'not_fecha' => 'Fecha',
			'not_titulo' => 'Titulo',
			'not_texto' => 'Texto',
			'not_programa' => 'Programa',
			'not_responsable' => 'Responsable',
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

		$criteria->compare('not_id',$this->not_id);
		$criteria->compare('not_user',$this->not_user);
		$criteria->compare('not_fecha',$this->not_fecha,true);
		$criteria->compare('not_titulo',$this->not_titulo,true);
		$criteria->compare('not_texto',$this->not_texto,true);
		$criteria->compare('not_programa',$this->not_programa,true);
		$criteria->compare('not_responsable',$this->not_responsable,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Noticia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
