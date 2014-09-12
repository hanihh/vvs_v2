<?php

/**
 * This is the model base class for the table "community".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Community".
 *
 * Columns in table "community" available as properties of the model,
 * followed by relations of table "community" available as properties of the model.
 *
 * @property integer $id
 * @property string $code
 * @property string $en_name
 * @property integer $subdistrict_id
 * @property string $ar_name
 *
 * @property Beneficiary[] $beneficiaries
 * @property Subdistrict $subdistrict
 * @property Subdistribution[] $subdistributions
 */
abstract class BaseCommunity extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'community';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Community|Communities', $n);
	}

	public static function representingColumn() {
		return 'en_name';
	}

	public function rules() {
		return array(
			array('en_name', 'required'),
			array('subdistrict_id', 'numerical', 'integerOnly'=>true),
			array('code', 'length', 'max'=>10),
			array('en_name, ar_name', 'length', 'max'=>255),
			array('code, subdistrict_id, ar_name', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, code, en_name, subdistrict_id, ar_name', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'beneficiaries' => array(self::HAS_MANY, 'Beneficiary', 'neighborhood_id'),
			'subdistrict' => array(self::BELONGS_TO, 'Subdistrict', 'subdistrict_id'),
			'subdistributions' => array(self::HAS_MANY, 'Subdistribution', 'region_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'code' => Yii::t('app', 'Code'),
			'en_name' => Yii::t('app', 'En Name'),
			'subdistrict_id' => null,
			'ar_name' => Yii::t('app', 'Ar Name'),
			'beneficiaries' => null,
			'subdistrict' => null,
			'subdistributions' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('code', $this->code, true);
		$criteria->compare('en_name', $this->en_name, true);
		$criteria->compare('subdistrict_id', $this->subdistrict_id);
		$criteria->compare('ar_name', $this->ar_name, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}