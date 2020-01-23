<?php

/**
 * This is the model class for table "plik".
 *
 * The followings are the available columns in table 'plik':
 * @property string $IDpliku
 * @property string $adres
 * @property string $data
 * @property integer $widok_IDwidoku
 * @property integer $katalog_IDkatalogu
 * @property integer $uzytkownik_IDuzytkownika
 * @property string $typ
 * @property string $nazwa
 * The followings are the available model relations:
 * @property Uzytkownik $uzytkownikIDuzytkownika
 * @property Katalog $katalogIDkatalogu
 * @property Widok $widokIDwidoku
 */
class Plik extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'plik';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('adres, katalog_IDkatalogu, uzytkownik_IDuzytkownika', 'required'),
			array('widok_IDwidoku, katalog_IDkatalogu, uzytkownik_IDuzytkownika', 'numerical', 'integerOnly'=>true),
			array('IDpliku, adres', 'length', 'max'=>255),
			array('typ', 'length', 'max'=>255),
			array('nazwa', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IDpliku, adres, widok_IDwidoku, katalog_IDkatalogu, uzytkownik_IDuzytkownika', 'safe', 'on'=>'search'),
		);
	}


protected function beforeSave()
	{
	    // generowanie unikalnego IDuzytkownika przed wgraniem do bazy danych
	    // rand 0-999999999 do 11 znaku uzupelniaj 0 od prawej
	    // np 888489 w bazie zapis 88848900000 
		$this->IDpliku = mt_rand(0, 999999999);
		
		if(!isset($this->IDpliku)) $this->IDpliku = str_pad(mt_rand(0, 999999999), 11, '0', STR_PAD_RIGHT);
		
		return parent::beforeSave();
	}
	
	
	protected function beforeDelete()
	{
	    // usuwanie pliku z dysku
				unlink(Yii::app()->basePath."../../..".$this->adres);
		
		return parent::beforeDelete();
	}
	
	
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'uzytkownikIDuzytkownika' => array(self::BELONGS_TO, 'Uzytkownik', 'uzytkownik_IDuzytkownika'),
			'katalogIDkatalogu' => array(self::BELONGS_TO, 'Katalog', 'katalog_IDkatalogu'),
			'widokIDwidoku' => array(self::BELONGS_TO, 'Widok', 'widok_IDwidoku'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IDpliku' => 'Idpliku',
			'adres' => 'Adres',
			'data' => 'Data',
			'typ' => 'Typ',
			'nazwa' => 'Nazwa',
			'widok_IDwidoku' => 'Sposob publikacji',
			'katalog_IDkatalogu' => 'Katalog',
			'uzytkownik_IDuzytkownika' => 'Uzytkownik',
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

		$criteria->compare('IDpliku',$this->IDpliku,true);
		$criteria->compare('adres',$this->adres,true);
		$criteria->compare('data',$this->data,true);
		$criteria->compare('widok_IDwidoku',$this->widok_IDwidoku);
		$criteria->compare('katalog_IDkatalogu',$this->katalog_IDkatalogu);
		$criteria->compare('uzytkownik_IDuzytkownika',$this->uzytkownik_IDuzytkownika);
		$criteria->compare('typ',$this->typ,true);
		$criteria->compare('nazwa',$this->nazwa,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Plik the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
