<?php

/**
 * This is the model class for table "widok".
 *
 * The followings are the available columns in table 'widok':
 * @property integer $IDwidoku
 * @property string $nazwa
 * @property string $opis
 *
 * The followings are the available model relations:
 * @property Katalog[] $katalogs
 * @property Plik[] $pliks
 * @property Uzytkownik[] $uzytkowniks
 */
class Widok extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'widok';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nazwa, opis', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IDwidoku, nazwa, opis', 'safe', 'on'=>'search'),
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
			'katalogs' => array(self::HAS_MANY, 'Katalog', 'widok_IDwidoku'),
			'pliks' => array(self::HAS_MANY, 'Plik', 'widok_IDwidoku'),
			'uzytkowniks' => array(self::HAS_MANY, 'Uzytkownik', 'widok_IDwidoku'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IDwidoku' => 'Idwidoku',
			'nazwa' => 'Nazwa',
			'opis' => 'Opis',
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

		$criteria->compare('IDwidoku',$this->IDwidoku);
		$criteria->compare('nazwa',$this->nazwa,true);
		$criteria->compare('opis',$this->opis,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Widok the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
