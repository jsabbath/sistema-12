<?php

/**
 * This is the model class for table "lista_curso".
 *
 * The followings are the available columns in table 'lista_curso':
 * @property integer $list_id
 * @property integer $list_mat_id
 * @property integer $list_posicion
 * @property integer $list_curso_id
 *
 * The followings are the available model relations:
 * @property Curso $listCurso
 */
class ListaCurso extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'lista_curso';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('list_id', 'required'),
			array('list_id, list_mat_id, list_posicion, list_curso_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('list_id, list_mat_id, list_posicion, list_curso_id', 'safe', 'on'=>'search'),
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
			'listCurso' => array(self::BELONGS_TO, 'Curso', 'list_curso_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'list_id' => 'List',
			'list_mat_id' => 'List Mat',
			'list_posicion' => 'List Posicion',
			'list_curso_id' => 'List Curso',
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

		$criteria->compare('list_id',$this->list_id);
		$criteria->compare('list_mat_id',$this->list_mat_id);
		$criteria->compare('list_posicion',$this->list_posicion);
		$criteria->compare('list_curso_id',$this->list_curso_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ListaCurso the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
