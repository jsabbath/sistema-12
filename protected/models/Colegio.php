<?php

/**
 * This is the model class for table "colegio".
 *
 * The followings are the available columns in table 'colegio':
 * @property integer $col_id
 * @property string $col_rolRBD
 * @property string $col_nombre_colegio
 * @property string $col_letra
 * @property integer $col_numero
 * @property integer $col_ano
 * @property integer $col_periodo
 * @property string $col_nombre_director
 * @property string $col_director_email
 * @property string $col_encargado_actas
 * @property integer $col_fecha_resol_rec_ofic
 * @property integer $col_numero_resol_rec_ofic
 * @property string $col_lema
 * @property string $col_mision
 * @property string $col_vision
 * @property string $col_area
 * @property string $col_regimen
 * @property string $col_logo
 * @property string $col_razon_social
 * @property string $col_rut_razon_social
 * @property string $col_fecha_primer
 * @property string $col_fecha_segundo
 * @property string $col_fecha_tercer
 * @property string $col_direccion
 * @property string $col_comuna
 * @property string $col_ciudad
 * @property string $col_colegio_email
 * @property integer $col_telefono
 * @property integer $col_nota_minima
 * @property integer $col_nota_maxima
 * @property integer $col_nota_aprovacion
 * @property integer $col_aproximacion
 */
class Colegio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'colegio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('col_numero, col_ano, col_periodo, col_fecha_resol_rec_ofic, col_numero_resol_rec_ofic, col_telefono, col_nota_minima, col_nota_maxima, col_nota_aprovacion, col_aproximacion', 'numerical', 'integerOnly'=>true),
			array('col_rolRBD, col_area, col_regimen, col_rut_razon_social', 'length', 'max'=>20),
			array('col_nombre_colegio, col_comuna, col_ciudad', 'length', 'max'=>50),
			array('col_letra', 'length', 'max'=>1),
			array('col_nombre_director, col_director_email, col_encargado_actas, col_razon_social, col_direccion, col_colegio_email', 'length', 'max'=>255),
			array('col_logo', 'file', 'types'=>'jpg, gif, png'),
			array('col_lema, col_mision, col_vision, col_fecha_primer, col_fecha_segundo, col_fecha_tercer', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('col_id, col_rolRBD, col_nombre_colegio, col_letra, col_numero, col_ano, col_periodo, col_nombre_director, col_director_email, col_encargado_actas, col_fecha_resol_rec_ofic, col_numero_resol_rec_ofic, col_lema, col_mision, col_vision, col_area, col_regimen, col_logo, col_razon_social, col_rut_razon_social, col_fecha_primer, col_fecha_segundo, col_fecha_tercer, col_direccion, col_comuna, col_ciudad, col_colegio_email, col_telefono, col_nota_minima, col_nota_maxima, col_nota_aprovacion, col_aproximacion', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'col_id' => 'ID',
			'col_rolRBD' => 'Rol RBD',
			'col_nombre_colegio' => 'Nombre Colegio',
			'col_letra' => 'Letra',
			'col_numero' => 'Numero',
			'col_ano' => 'Ano',
			'col_periodo' => 'Periodo',
			'col_nombre_director' => 'Nombre Director',
			'col_director_email' => 'Email Director',
			'col_encargado_actas' => 'Encargado Actas',
			'col_fecha_resol_rec_ofic' => 'Fecha Resol. Rec. Ofic.',
			'col_numero_resol_rec_ofic' => 'Numero Resol. Rec. Ofic.',
			'col_lema' => 'Lema',
			'col_mision' => 'Mision',
			'col_vision' => 'Vision',
			'col_area' => 'Area',
			'col_regimen' => 'Regimen',
			'col_logo' => 'Logo',
			'col_razon_social' => 'Razon Social',
			'col_rut_razon_social' => 'Rut Razon Social',
			'col_fecha_primer' => 'Fecha Primera Actividad Escolar',
			'col_fecha_segundo' => 'Fecha Segunda Actividad Escolar',
			'col_fecha_tercer' => 'Fecha Tercera Actividd Escolar',
			'col_direccion' => 'Direccion',
			'col_comuna' => 'Comuna',
			'col_ciudad' => 'Ciudad',
			'col_colegio_email' => 'Email Colegio',
			'col_telefono' => 'Telefono',
			'col_nota_minima' => 'Nota Minima',
			'col_nota_maxima' => 'Nota Maxima',
			'col_nota_aprovacion' => 'Nota Aprovacion',
			'col_aproximacion' => 'Tipo Promedio',
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

		$criteria->compare('col_id',$this->col_id);
		$criteria->compare('col_rolRBD',$this->col_rolRBD,true);
		$criteria->compare('col_nombre_colegio',$this->col_nombre_colegio,true);
		$criteria->compare('col_letra',$this->col_letra,true);
		$criteria->compare('col_numero',$this->col_numero);
		$criteria->compare('col_ano',$this->col_ano);
		$criteria->compare('col_periodo',$this->col_periodo);
		$criteria->compare('col_nombre_director',$this->col_nombre_director,true);
		$criteria->compare('col_director_email',$this->col_director_email,true);
		$criteria->compare('col_encargado_actas',$this->col_encargado_actas,true);
		$criteria->compare('col_fecha_resol_rec_ofic',$this->col_fecha_resol_rec_ofic);
		$criteria->compare('col_numero_resol_rec_ofic',$this->col_numero_resol_rec_ofic);
		$criteria->compare('col_lema',$this->col_lema,true);
		$criteria->compare('col_mision',$this->col_mision,true);
		$criteria->compare('col_vision',$this->col_vision,true);
		$criteria->compare('col_area',$this->col_area,true);
		$criteria->compare('col_regimen',$this->col_regimen,true);
		$criteria->compare('col_logo',$this->col_logo,true);
		$criteria->compare('col_razon_social',$this->col_razon_social,true);
		$criteria->compare('col_rut_razon_social',$this->col_rut_razon_social,true);
		$criteria->compare('col_fecha_primer',$this->col_fecha_primer,true);
		$criteria->compare('col_fecha_segundo',$this->col_fecha_segundo,true);
		$criteria->compare('col_fecha_tercer',$this->col_fecha_tercer,true);
		$criteria->compare('col_direccion',$this->col_direccion,true);
		$criteria->compare('col_comuna',$this->col_comuna,true);
		$criteria->compare('col_ciudad',$this->col_ciudad,true);
		$criteria->compare('col_colegio_email',$this->col_colegio_email,true);
		$criteria->compare('col_telefono',$this->col_telefono);
		$criteria->compare('col_nota_minima',$this->col_nota_minima);
		$criteria->compare('col_nota_maxima',$this->col_nota_maxima);
		$criteria->compare('col_nota_aprovacion',$this->col_nota_aprovacion);
		$criteria->compare('col_aproximacion',$this->col_aproximacion);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Colegio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
