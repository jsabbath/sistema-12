<?php

/**
 * This is the model class for table "alumno".
 *
 * The followings are the available columns in table 'alumno':
 * @property integer $alum_id
 * @property string $alum_rut
 * @property string $alum_nombres
 * @property string $alum_apepat
 * @property string $alum_apemat
 * @property string $alum_direccion
 * @property integer $alum_comuna
 * @property integer $alum_ciudad
 * @property integer $alum_region
 * @property integer $alum_genero
 * @property string $alum_f_nac
 * @property string $alum_salud
 * @property string $alum_obs
 *
 * The followings are the available model relations:
 * @property Comuna $alumComuna
 * @property Ciudad $alumCiudad
 * @property Region $alumRegion
 * @property Parametro $alumGenero
 * @property Matricula[] $matriculas
 */
class Alumno extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'alumno';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('alum_comuna, alum_ciudad, alum_region, alum_genero, alum_dormitorios, alum_fam1_ingreso,
					alum_baño_cantidad, alum_vivienda, alum_construccion, alum_baño_tipo, alum_padre_ingresos,
					alum_madre_nivel, alum_fam2_ingreso', 'numerical', 'integerOnly'=>true),
			array('alum_rut','required','message'=>'Debe ingresar un Rut'),
			array('alum_rut','validateRut','message'=>'alumno: Ingrese un Rut valido'),
			array('alum_padre_rut','validateRut','message'=>'Padre: Ingrese un Rut valido'),
			array('alum_madre_rut','validateRut','message'=>'Madre: Ingrese un Rut valido'),
			array('alum_apo1_rut, alum_apo2_rut','validateRut','message'=>'Apoderado: Ingrese un Rut valido'),
			array('alum_rut, alum_madre_rut, alum_padre_rut, alum_apo1_rut, alum_apo2_rut', 'length', 'max'=>12),
			array('alum_nombres','required','message'=>'Debe ingresar un nombre'),
			array('alum_nombres','validateText','message'=>'Ingrese un nombre valido'),
			array('alum_nombres, alum_procedencia', 'length', 'max'=>100),
			array('alum_apepat','required','message'=>'Debe ingresar un apellido paterno'),
			array('alum_apepat','validateText','message'=>'Debe ingresar un apellido paterno valido'),
			array('alum_apemat','required','message'=>'Debe ingresar un apellido materno'),
			array('alum_apemat','validateText','message'=>'Debe ingresar un apellido materno valido'),
			array('alum_apepat, alum_apemat', 'length', 'max'=>20),
			array('alum_direccion','required','message'=>'Debe ingresar una direccion'),
			array('alum_direccion', 'length', 'max'=>255),
			array('alum_f_nac','validateFechaNacimiento'),
			array('alum_f_nac','required','message'=>'Debe ingresar una fecha de nacimiento'),
			array('alum_f_nac, alum_salud, alum_enfermedad, alum_medicamentos, alum_padre_nombre,
					alum_aprendizaje, alum_padre_nivel, alum_vive_con,
					alum_apo1_nombre, alum_apo1_telefono, alum_apo2_nombre, alum_apo2_telefono, alum_fam1_actividad, alum_fam1_lugar,
					alum_madre_ingresos, alum_madre_actividad, alum_madre_act_tipo, alum_padre_act_tipo, alum_padre_actividad,
					alum_obs, alum_fonos_emergencia, alum_madre_nombre, alum_fam2_actividad, alum_fam2_lugar, alum_transporte, alum_religion', 'safe'),
			array('alum_comuna','required','message'=>'Debe seleccionar una comuna'),
			array('alum_region','required','message'=>'Debe seleccionar una region'),
			array('alum_ciudad','required','message'=>'Debe seleccionar una ciudad'),
			array('alum_genero','required','message'=>'Debe seleccionar un genero'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('alum_id, alum_rut, alum_nombres, alum_apepat, alum_apemat, alum_direccion, alum_comuna, alum_ciudad, alum_region, alum_genero, alum_f_nac, alum_salud, alum_obs', 'safe', 'on'=>'search'),
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
			'alumComuna' => array(self::BELONGS_TO, 'Comuna', 'alum_comuna'),
			'alumCiudad' => array(self::BELONGS_TO, 'Ciudad', 'alum_ciudad'),
			'alumRegion' => array(self::BELONGS_TO, 'Region', 'alum_region'),
			'alumGenero' => array(self::BELONGS_TO, 'Parametro', 'alum_genero'),
			'alumReligion' => array(self::BELONGS_TO, 'Parametro', 'alum_religion'),
			'matriculas' => array(self::HAS_ONE, 'Matricula', 'mat_alu_id'),
			'alumConstruccion' => array(self::BELONGS_TO, 'Parametro', 'alum_construccion'),
			'alumVivienda' => array(self::BELONGS_TO, 'Parametro', 'alum_vivienda'),
			'alumBañotipo' => array(self::BELONGS_TO, 'Parametro', 'alum_baño_tipo'),
			'alumPadrenivel' => array(self::BELONGS_TO, 'Parametro', 'alum_padre_nivel'),
			'alumMadrenivel' => array(self::BELONGS_TO, 'Parametro', 'alum_madre_nivel'),
			'alumVivecon'	=> array(self::BELONGS_TO, 'Parametro', 'alum_vive_con'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'alum_id' => 'ID',
			'alum_rut' => 'Rut',
			'alum_nombres' => 'Nombres',
			'alum_apepat' => 'Apellido Paterno',
			'alum_apemat' => 'Apellido Materno',
			'alum_direccion' => 'Direccion',
			'alum_comuna' => 'Comuna',
			'alum_ciudad' => 'Ciudad',
			'alum_region' => 'Region',
			'alum_genero' => 'Genero',
			'alum_f_nac' => 'Fecha Nacimiento',
			'alum_salud' => 'Situacion de salud',
			'alum_obs' => 'Observaciones',
			'alum_procedencia' => 'Colegio  de Procedencia',
			'alum_medicamentos' => 'Medicamentos',
			'alum_enfermedad' => 'Enfermedad',
			'alum_religion'	=> 'Religion',
			'alum_transporte' => 'Transporte',
			'alum_aprendizaje' => 'Estado academico',
			'alum_vivienda'	=> 'Vivienda',
			'alum_construccion' => 'Tipo de construccion',
			'alum_baño_cantidad' => 'Cantidad de baños',
			'alum_baño_tipo' => 'Tipo de baño',
			'alum_dormitorios' => 'Cantidad de dormitorios',
			'alum_fonos_emergencia' => 'Fonos de Emergencia',
			'alum_madre_nombre'	=> 'Nombre Madre',
			'alum_madre_rut'	=> 'Rut Madre',
			'alum_madre_nivel'	=> 'Nivel Educacional Madre',
			'alum_madre_actividad'	=> 'Actividad Madre',
			'alum_madre_ingresos'	=> 'Ingresos',
			'alum_madre_act_tipo'	=> 'Lugar o Empresa',
			'alum_padre_nombre' 	=> 'Nombre Padre',
			'alum_padre_rut'		=> 'Rut Padre',
			'alum_padre_nivel'		=> 'Nivel Educacional Padre',
			'alum_padre_actividad'	=> 'Actividad Padre',
			'alum_padre_ingresos'	=> 'Ingresos',
			'alum_padre_act_tipo'	=> 'Lugar o Empresa',
			'alum_apo1_nombre'		=> 'Nombre Apoderado Oficial',
			'alum_apo1_rut'			=> 'Rut Apoderado Oficial',
			'alum_apo1_telefono'	=> 'Fono Apoderado Oficial',
			'alum_apo2_nombre'		=> 'Nombre Apoderado Suplente',
			'alum_apo2_rut'			=> 'Rut Apoderado Suplente',
			'alum_apo2_telefono'	=> 'Fono Apoderado Suplente',
			'alum_fam1_lugar'		=> 'Lugar o Empresa',
			'alum_fam1_ingreso'		=> 'Ingresos',
			'alum_fam1_actividad'	=> 'Actividad otro familiar',
			'alum_fam2_lugar'		=> 'Lugar o Empresa',
			'alum_fam2_ingreso'		=> 'Ingresos',
			'alum_fam2_actividad'	=> 'Actividad otro familiar',
			'alum_vive_con'			=> 'El alumno vive con',
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

		$criteria->compare('alum_id',$this->alum_id);
		$criteria->compare('alum_rut',$this->alum_rut,true);
		$criteria->compare('alum_nombres',$this->alum_nombres,true);
		$criteria->compare('alum_apepat',$this->alum_apepat,true);
		$criteria->compare('alum_apemat',$this->alum_apemat,true);
		$criteria->compare('alum_direccion',$this->alum_direccion,true);
		$criteria->compare('alum_comuna',$this->alum_comuna);
		$criteria->compare('alum_ciudad',$this->alum_ciudad);
		$criteria->compare('alum_region',$this->alum_region);
		$criteria->compare('alum_genero',$this->alum_genero);
		$criteria->compare('alum_f_nac',$this->alum_f_nac,true);
		$criteria->compare('alum_salud',$this->alum_salud,true);
		$criteria->compare('alum_obs',$this->alum_obs,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Alumno the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getNombre_completo(){
		return $this->alum_nombres." ".$this->alum_apepat;
	}

	public function getNombre_completo_2(){
		return $this->alum_apepat." ".$this->alum_apemat.", ". $this->alum_nombres;
	}

	public function getNombre_completo_3(){
		return $this->alum_nombres." ".$this->alum_apepat." ".$this->alum_apemat;
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
				if(($interval->y) < 3){
				    $this->addError($attribute,'Fecha de Nacimiento: Solo se pueden ingresar mayores de 3 Años');
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
