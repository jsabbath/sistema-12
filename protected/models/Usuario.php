<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $usu_id
 * @property string $usu_nombre1
 * @property string $usu_nombre2
 * @property string $usu_apepat
 * @property string $usu_apemat
 * @property string $usu_rut
 * @property integer $usu_estado
 * @property integer $usu_iduser
 *
 * The followings are the available model relations:
 * @property AAsignatura[] $aAsignaturas
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
			array('usu_nombre1, usu_nombre2, usu_apepat, usu_apemat, usu_rut, usu_estado', 'required'),
			array('usu_estado, usu_iduser', 'numerical', 'integerOnly'=>true),
			array('usu_nombre1', 'length', 'max'=>20),
			array('usu_nombre2', 'length', 'max'=>50),
			array('usu_apepat, usu_apemat', 'length', 'max'=>30),
			array('usu_rut', 'length', 'max'=>12),
                        array('usu_rut','validateRut' ),
                        array('usu_rut','validaRutCaracter'),
                        array('usu_rut', 'validaRutUnico'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('usu_id, usu_nombre1, usu_nombre2, usu_apepat, usu_apemat, usu_rut, usu_estado, usu_iduser', 'safe', 'on'=>'search'),
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
			'usuIduser' => array(self::BELONGS_TO, 'CrugeUser', 'usu_iduser'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'usu_id' => 'Usu',
			'usu_nombre1' => 'Usu Nombre1',
			'usu_nombre2' => 'Usu Nombre2',
			'usu_apepat' => 'Usu Apepat',
			'usu_apemat' => 'Usu Apemat',
			'usu_rut' => 'Usu Rut',
			'usu_estado' => 'Usu Estado',
			'usu_iduser' => 'Usu Iduser',
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
		$criteria->compare('usu_nombre1',$this->usu_nombre1,true);
		$criteria->compare('usu_nombre2',$this->usu_nombre2,true);
		$criteria->compare('usu_apepat',$this->usu_apepat,true);
		$criteria->compare('usu_apemat',$this->usu_apemat,true);
		$criteria->compare('usu_rut',$this->usu_rut,true);
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
        
        public function validateRut($attribute, $params) {
        if (strpos($this->$attribute, "-") == false) {
            $data[0] = substr($this->$attribute, 0, -1);
            $data[1] = substr($this->$attribute, -1);
        } else {
            $data = explode('-', $this->$attribute);
        }
        $evaluate = strrev(str_replace(".", "", trim($data[0])));
        $multiply = 2;
        $store = 0;
        for ($i = 0; $i < strlen($evaluate); $i++) {
            $store += $evaluate[$i] * $multiply;
            $multiply++;
            if ($multiply > 7)
                $multiply = 2;
        }
        isset($data[1]) ? $verifyCode = strtolower($data[1]) : $verifyCode = '';
        $result = 11 - ($store % 11);
        if ($result == 10)
            $result = 'k';
        if ($result == 11)
            $result = 0;
        if ($verifyCode != $result)
            $this->addError($attribute, 'El Rut no es válido');
    }
    
    
     public function validaRutCaracter($attribute, $params) {
        $pattern = '/^([0-9.]+\-+[0-9kK]{1}+)$/';
        $pattern2 = '/^([0-9.]{1}+\-+[0-9kK]{1}+)$/';
        $pattern3 = '/^([0.]+\-+[0-9kK]{1}+)$/';
        if (!preg_match($pattern, $this->$attribute) OR preg_match($pattern2, $this->$attribute) OR preg_match($pattern3, $this->$attribute))
            $this->addError($attribute, 'el rut deve ser: 11.111.111-1');
    }
    public function validaRutUnico($attribute, $params) {
        if (Yii::app()->user->um->loadUser($this->$attribute))
            $this->addError($attribute, 'Rut ya existe y esta siendo ocupado');
    }


}
