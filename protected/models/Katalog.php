<?php

/**
 * This is the model class for table "katalog".
 *
 * The followings are the available columns in table 'katalog':
 * @property integer $IDkatalogu
 * @property string $nazwa
 * @property string $opis
 * @property string $data
 * @property string $obraz
 * @property integer $widoczny
 * @property integer $uzytkownik_IDuzytkownika
 *
 * The followings are the available model relations:
 * @property Uzytkownik $uzytkownikIDuzytkownika
 * @property Plik[] $pliks
 */
class Katalog extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'katalog';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nazwa, opis, widok_IDwidoku', 'required', 'message'=>'Wpisz!!'),
			array('uzytkownik_IDuzytkownika', 'numerical', 'integerOnly'=>true),
			array('nazwa', 'length', 'max'=>45),
			array('opis, unikalna', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IDkatalogu, nazwa, opis, data, plik_IDpliku, uzytkownik_IDuzytkownika', 'safe', 'on'=>'search'),
		);
	}
	
	protected function beforeSave()
	{
	    // generowanie unikalnego IDuzytkownika przed wgraniem do bazy danych
	    // rand 0-999999999 do 11 znaku uzupelniaj 0 od lewej
	    // np 00000888489 w bazie zapis 888489 

		$this->uzytkownik_IDuzytkownika = Yii::app()->user->id;
		if(!isset($this->IDkatalogu)) $this->IDkatalogu = str_pad(mt_rand(0, 999999999), 9, '0', STR_PAD_RIGHT);
		if(!isset($this->unikalna)) $this->unikalna = strtoupper(md5(date('l jS F Y h:i:s A').$this->nazwa.''.$this->IDkatalogu));
		
		return parent::beforeSave();
	}
	
	
		protected function beforeDelete()
	{
	    // usuwanie wszystkich plików nale¿¹cych do katalogu

		foreach ($this->pliks as $plik)
		{
		$plik->delete();
		}
		
		
		
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
			'widokIDwidoku' => array(self::BELONGS_TO, 'Widok', 'widok_IDwidoku'),
			'uzytkownikIDuzytkownika' => array(self::BELONGS_TO, 'Uzytkownik', 'uzytkownik_IDuzytkownika'),
			'plikIDpliku' => array(self::BELONGS_TO, 'Plik', 'plik_IDpliku'),
			'pliks' => array(self::HAS_MANY, 'Plik', 'katalog_IDkatalogu',
                                              'order'=>'pliks.data DESC',),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IDkatalogu' => 'Idkatalogu',
			'nazwa' => 'Nazwa',
			'opis' => 'Opis',
			'data' => 'Data',
			'unikalna' => 'Unikalny klucz',
			'plik_IDpliku' => 'Obraz',
      'widok_IDwidoku' => 'Sposob publikacji',
			'uzytkownik_IDuzytkownika' => 'Autor',
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

		$criteria->compare('IDkatalogu',$this->IDkatalogu);
		$criteria->compare('nazwa',$this->nazwa,true);
		$criteria->compare('opis',$this->opis,true);
		$criteria->compare('data',$this->data,true);
    $criteria->compare('widok_IDwidoku',$this->widok_IDwidoku);
		$criteria->compare('uzytkownik_IDuzytkownika',$this->uzytkownik_IDuzytkownika);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Katalog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
