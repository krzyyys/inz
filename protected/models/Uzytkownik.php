<?php
class Uzytkownik extends CActiveRecord
{

   // holds the password confirmation word
    public $repeat_password;
 
    //will hold the encrypted password for update actions.
    public $initialPassword;
    
    public $old_password;
    public $new_password;
    public $powtorz_password;

   
    
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'uzytkownik';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
        array('login, email', 'required','message'=>'{attribute} nie moze byc puste.', 'on'=>'insert'),
        array('login, email', 'unique','message'=>'{attribute} juz istnieje.', 'on'=>'insert' ),
        array('role_IDroli', 'numerical', 'integerOnly'=>true),
        array('widok_IDwidoku, role_IDroli', 'numerical', 'integerOnly'=>true),
        array('email', 'email','message'=>'To nie e-mail.'),
        array('login', 'length', 'max'=>60),
        array('email', 'length', 'max'=>100),
        array('imie', 'length', 'max'=>45),
		  
			
        array('IDuzytkownika, login, email, zarejestrowany, imie,plik_IDpliku,', 'safe', 'on'=>'search'),

        array('haslo, repeat_password', 'required', 'on'=>'insert','message'=>'{attribute} nie moze byc puste.'),
        
        array('haslo, repeat_password', 'length', 'min'=>6, 'max'=>40,'tooShort'=>'Za krotkie.',
                                                                  'tooLong'=>'Za dlugie.'),
        array('haslo', 'compare', 'compareAttribute'=>'repeat_password', 'on'=>'insert', 'message'=>'Pola hasla musza byc identyczne.'),
        array('repeat_password', 'compare', 'compareAttribute'=>'haslo','message'=>'Pola hasla musza byc identyczne.', 'on'=>'insert',),
      
        array('old_password, new_password, powtorz_password', 'required', 'on' => 'changePwd','message'=>'{attribute} nie moze byc puste.'),
        array('old_password', 'findPasswords', 'on' => 'changePwd','message'=>'Zle stare haslo.'),
        array('powtorz_password', 'compare', 'compareAttribute'=>'new_password', 'on'=>'changePwd','message'=>'Pola hasla musza byc identyczne.'),
		
		);
	}

  
	protected function beforeSave()
	{
	    // generowanie unikalnego IDuzytkownika przed wgraniem do bazy danych
	    // rand 0-999999999 do 11 znaku uzupelniaj 0 od lewej
	    // np 00000888489 w bazie zapis 888489 
	    if(!isset($this->IDuzytkownika)) $this->IDuzytkownika = str_pad(mt_rand(0, 999999999), 11, '0', STR_PAD_LEFT);

	     $pass = md5($this->haslo);
       $this->haslo = $pass;
      

		return parent::beforeSave();
	}
	
	protected function beforeDelete()
	{
	    // usuwanie wszystkich katalogów nale¿¹cych do u¿ytkownika

		foreach ($this->katalogs as $katalog)
		{
		$katalog->delete();
    }
  		
			return parent::beforeDelete();
	}
  
  protected function afterDelete(){
  
  parent::afterDelete();
    Yii::app()->runController('site/Logout');
    
    
  }
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'katalogs' => array(self::HAS_MANY, 'Katalog', 'uzytkownik_IDuzytkownika'),
			'pliks' => array(self::HAS_MANY, 'Plik', 'uzytkownik_IDuzytkownika'),
			'roleIDroli' => array(self::BELONGS_TO, 'Role', 'role_IDroli'),
			'plikIDpliku' => array(self::BELONGS_TO, 'Plik', 'plik_IDpliku'),
      'widokIDwidoku' => array(self::BELONGS_TO, 'Widok', 'widok_IDwidoku'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IDuzytkownika' => 'Iduzytkownika',
			'login' => 'Login',
			'haslo' => 'Haslo',
			'email' => 'E-mail',
			'zarejestrowany' => 'Zarejestrowany',
			'imie' => 'Imie',
			'plik_IDpliku' => 'Obraz',
			'role_IDroli' => 'Rola w systemie',
			'widok_IDwidoku' => 'Widok Idwidoku',
			'repeat_password' => 'Potwierdz',
			'old_password' => 'Stare haslo',
			'new_password' => 'Nowe haslo',
			'powtorz_password' => 'Powtorz nowe haslo',
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

		$criteria->compare('IDuzytkownika',$this->IDuzytkownika);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('haslo',$this->haslo,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('zarejestrowany',$this->zarejestrowany,true);
		$criteria->compare('imie',$this->imie,true);
		$criteria->compare('role_IDroli',$this->role_IDroli);
		$criteria->compare('widok_IDwidoku',$this->widok_IDwidoku);

        return new CActiveDataProvider($this,
            array(
                'criteria' => $criteria,

            ));
	}
	
	
	public function findPasswords($attribute, $params)
    {
        $user = Uzytkownik::model()->findByPk(Yii::app()->user->id);
        if ($user->haslo !== md5($this->old_password))
            $this->addError($attribute, 'Stare haslo jest zle.');
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Uzytkownik the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
