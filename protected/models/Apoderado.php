<?php

/**
 * This is the model class for table "apoderado".
 *
 * The followings are the available columns in table 'apoderado':
 * @property integer $apo_id
 * @property string $apo_nombre1
 * @property string $apo_nombre2
 * @property string $apo_apepat
 * @property string $apo_apemat
 * @property string $apo_rut
 * @property integer $apo_ano
 * @property integer $apo_hijo
 *
 * The followings are the available model relations:
 * @property Matricula $apoHijo
 */
class Apoderado extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'apoderado';
	}

	public $alumno_nombres;
	public $alumno_apepat;
	public $alumno_apemat;

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('apo_rut','required','message'=>'Debe ingresar un Rut'),
			array('apo_nombre1','required','message'=>'Debe ingresar Primer Nombre'),
			array('apo_nombre2','required','message'=>'Debe ingresar Segundo Nombre'),
			array('apo_apepat','required','message'=>'Debe ingresar Apellido Paterno'),
			array('apo_apemat','required','message'=>'Debe ingresar Apellido Materno'),

			array('apo_rut','validateRut','message'=>'Ingrese un Rut valido'),
			array('apo_nombre1','validateText','message'=>'Ingrese un Primer Nombre valido'),
			array('apo_nombre2','validateText','message'=>'Ingrese un Segundo Nombre valido'),
			array('apo_apepat','validateText','message'=>'Ingrese un Apellido Paterno valido'),
			array('apo_apemat','validateText','message'=>'Ingrese un Apellido Materno valido'),

			array('apo_ano, apo_hijo', 'numerical', 'integerOnly'=>true),
			array('apo_nombre1, apo_nombre2, apo_apepat, apo_apemat', 'length', 'max'=>20),
			array('apo_rut', 'length', 'max'=>12),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('apo_id, apo_nombre1, apo_nombre2, apo_apepat, apo_apemat, apo_rut, apo_ano, apo_hijo', 'safe', 'on'=>'search'),
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
			'apoHijo' => array(self::BELONGS_TO, 'Matricula', 'apo_hijo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'apo_id' => 'ID',
			'apo_nombre1' => 'Primer Nombre',
			'apo_nombre2' => 'Segundo Nombre',
			'apo_apepat' => 'Apellido Paterno',
			'apo_apemat' => 'Apellido Materno',
			'apo_rut' => 'Rut',
			'apo_ano' => 'Ano',
			'apo_hijo' => 'Hijo',
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

		$criteria->compare('apo_id',$this->apo_id);
		$criteria->compare('apo_nombre1',$this->apo_nombre1,true);
		$criteria->compare('apo_nombre2',$this->apo_nombre2,true);
		$criteria->compare('apo_apepat',$this->apo_apepat,true);
		$criteria->compare('apo_apemat',$this->apo_apemat,true);
		$criteria->compare('apo_rut',$this->apo_rut,true);
		$criteria->compare('apo_ano',$this->apo_ano);
		$criteria->with = array('apoHijo');
		$criteria->addSearchCondition('apoHijo.matAlu.alum_nombres', $this->alumno_nombres);
		$criteria->addSearchCondition('apoHijo.matAlu.alum_apepat', $this->alumno_apepat);
		$criteria->addSearchCondition('apoHijo.matAlu.alum_apemat', $this->alumno_apemat);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function buscar($ano)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('apo_id',$this->apo_id);
		$criteria->compare('apo_nombre1',$this->apo_nombre1,true);
		$criteria->compare('apo_nombre2',$this->apo_nombre2,true);
		$criteria->compare('apo_apepat',$this->apo_apepat,true);
		$criteria->compare('apo_apemat',$this->apo_apemat,true);
		$criteria->compare('apo_rut',$this->apo_rut,true);
		$criteria->compare('apo_ano',$ano);
		$criteria->with = array('apoHijo');
		$criteria->addSearchCondition('apoHijo.matAlu.alum_nombres', $this->alumno_nombres);
		$criteria->addSearchCondition('apoHijo.matAlu.alum_apepat', $this->alumno_apepat);
		$criteria->addSearchCondition('apoHijo.matAlu.alum_apemat', $this->alumno_apemat);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Apoderado the static model class
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
    
    public function validateText2($attribute, $params) {
        $pattern = '/^([a-zA-ZñÑÁÉÍÓÚáéíóú0-9º°\.\,\'\"\)\(\-\@\:\/\+]+([[:space:]]{0,2}[a-zA-ZñÑÁÉÍÓÚáéíóú0-9º°\.\,\'\"\)\(\-\@\:\/\+]+)*)$/';
        $pattern2 = '/^([0-9º°\.\,\'\"\)\(\-\@\:\/\+]+)$/';
        if($this->$attribute!=""){
	        if (!preg_match($pattern, $this->$attribute))
	            $this->addError($attribute, $attribute.': Se deben ingresar letras o letras y números, verifique que no tenga espacios al final o en medio.');
	        if (preg_match($pattern2, $this->$attribute))
	            $this->addError($attribute, $attribute.': Error No puede ser solo números o caracteres especiales');
    	}
    }
    public function validateText3($attribute, $params) {
        $pattern2 = '/(a{3}|e{3}|i{4}|o{3}|u{3}|b{3}|c{3}|d{3}|f{3}|g{3}|h{3}|j{3}|k{3}|l{4}|m{3}|n{3}|ñ{3}|p{3}|q{3}|r{3}|s{3}|t{3}|v{3}|w{4}|x{3}|y{3}|z{3}|º{2}|°{2}|\.{2}|\'{2}|\"{2}|\){2}|\({2}|\,{2}|\-{2}|\@{2}|\:{2}|\/{3}|\+{2})/i';
        $pattern3 = '/(A{3}|E{3}|I{4}|O{3}|U{3}|B{3}|C{3}|D{3}|F{3}|G{3}|H{3}|J{3}|K{3}|L{4}|M{3}|N{3}|Ñ{3}|P{3}|Q{3}|R{3}|S{3}|T{3}|V{3}|W{4}|X{3}|Y{3}|Z{3})/i';
        $pattern4 = '/(á{3}|Á{3}|é{3}|É{3}|í{3}|Í{3}|ó{3}|Ó{3}|ú{3}|Ú{3})/i';
        $pattern5 = '/([0-9]{13})/i';
        if($this->$attribute!=""){
	        if (preg_match($pattern2, $this->$attribute) OR preg_match($pattern3, $this->$attribute) OR preg_match($pattern4, $this->$attribute))
	            $this->addError($attribute, $attribute.': Verifique que no este repetidos continuamente los caracteres');
	        if (preg_match($pattern5, $this->$attribute))
	            $this->addError($attribute, $attribute.': No puede haber un número superior a 9999999999999');
    	}
    }
    public function validateFechaNacimiento($attribute, $params) {
    	if($this->$attribute!=""){	
			if(strtotime($this->$attribute) && 1 === preg_match('~[0-9]~', $this->$attribute)){
			    $date1 = new DateTime(date('Y-m-d'));
				$date2 = new DateTime($this->$attribute);
				$interval = $date1->diff($date2);
				if(($interval->y) < 18){
				    $this->addError($attribute,'Fecha de Nacimiento: Solo se pueden ingresar Donantes Mayores de 18 Años');
				}
			}else{
				$this->addError($attribute,'Fecha de Nacimiento: Ingrese una fecha valida');
			}
	    }
    }
     public function validateRut($attribute, $params) {
	 	$rut = str_split($this->$attribute);
	 	$array_rut = array();
	    for($i=0; $i< strlen($this->$attribute); $i++) {
	    	if($rut[$i]!='.'){
	    	  $array_rut[]=$rut[$i];	
			}
	    }
	    
	    $rut_attribute = implode("", $array_rut);
        if (strpos($rut_attribute, "-") == false) {
            $data[0] = substr($rut_attribute, 0, -1);
            $data[1] = substr($rut_attribute, -1);
        } else {
            $data = explode('-', $rut_attribute);
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
            $this->addError($attribute,'El Rut ingresado no es valido');
    }
    public function validateRutCaracter($attribute, $params) {
    	$rut = str_split($this->$attribute);
    	$array_rut = array();
	    for($i=0; $i< strlen($this->$attribute); $i++) {
	    	if($rut[$i]!='.'){
	    	  $array_rut[]=$rut[$i];	
			}
	    }
	    $rut_attribute = implode("", $array_rut);
        $pattern = '/^([0-9.]+\-+[0-9kK]{1}+)$/';
        $pattern2 = '/^([0-9.]{1}+\-+[0-9kK]{1}+)$/';
        $pattern3 = '/^([0.]+\-+[0-9kK]{1}+)$/';
        if (!preg_match($pattern, $rut_attribute) OR preg_match($pattern2, $rut_attribute) OR preg_match($pattern3, $rut_attribute))
            $this->addError($attribute, 'El Rut ingresado no es valido');
    }
}
