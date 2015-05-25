<?php

/**
 * This is the model class for table "escala_hogar".
 *
 * The followings are the available columns in table 'escala_hogar':
 * @property integer $eh_id
 * @property string $eh_descripcion
 *
 * The followings are the available model relations:
 * @property EvaHogar[] $evaHogars
 * @property EvaHogar[] $evaHogars1
 */
class EscalaHogar extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'escala_hogar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('eh_descripcion', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('eh_id, eh_descripcion', 'safe', 'on'=>'search'),
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
			'evaHogars' => array(self::HAS_MANY, 'EvaHogar', 'eh_eva1'),
			'evaHogars1' => array(self::HAS_MANY, 'EvaHogar', 'eh_eva2'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'eh_id' => 'ID',
			'eh_descripcion' => 'Descripcion',
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

		$criteria->compare('eh_id',$this->eh_id);
		$criteria->compare('eh_descripcion',$this->eh_descripcion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EscalaHogar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
