<?php

/**
 * This is the model class for table "pro_mat".
 *
 * The followings are the available columns in table 'pro_mat':
 * @property integer $PRO_MAT_ID
 * @property integer $PRO_MAT_ANUAL
 * @property integer $PRO_MATRI
 *
 * The followings are the available model relations:
 * @property PromedioAnual $pROMATANUAL
 * @property Matricula $pROMATRI
 */
class ProMat extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pro_mat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PRO_MAT_ANUAL, PRO_MATRI', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('PRO_MAT_ID, PRO_MAT_ANUAL, PRO_MATRI', 'safe', 'on'=>'search'),
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
			'pROMATANUAL' => array(self::BELONGS_TO, 'PromedioAnual', 'PRO_MAT_ANUAL'),
			'pROMATRI' => array(self::BELONGS_TO, 'Matricula', 'PRO_MATRI'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'PRO_MAT_ID' => 'Pro Mat',
			'PRO_MAT_ANUAL' => 'Pro Mat Anual',
			'PRO_MATRI' => 'Pro Matri',
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

		$criteria->compare('PRO_MAT_ID',$this->PRO_MAT_ID);
		$criteria->compare('PRO_MAT_ANUAL',$this->PRO_MAT_ANUAL);
		$criteria->compare('PRO_MATRI',$this->PRO_MATRI);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProMat the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
