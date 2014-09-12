<?php

/**
 * This is the model base class for the table "vendor_mobile".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "VendorMobile".
 *
 * Columns in table "vendor_mobile" available as properties of the model,
 * followed by relations of table "vendor_mobile" available as properties of the model.
 *
 * @property integer $id
 * @property integer $subdistribution_id
 * @property integer $vendor_id
 * @property integer $phone_id
 *
 * @property Subdistribution $subdistribution
 * @property Vendor $vendor
 * @property Phone $phone
 */
abstract class BaseVendorMobile extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'vendor_mobile';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'VendorMobile|VendorMobiles', $n);
	}

	public static function representingColumn() {
		return 'id';
	}

	public function rules() {
		return array(
			array('subdistribution_id, vendor_id, phone_id', 'required'),
			array('subdistribution_id, vendor_id, phone_id', 'numerical', 'integerOnly'=>true),
			array('id, subdistribution_id, vendor_id, phone_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'subdistribution' => array(self::BELONGS_TO, 'Subdistribution', 'subdistribution_id'),
			'vendor' => array(self::BELONGS_TO, 'Vendor', 'vendor_id'),
			'phone' => array(self::BELONGS_TO, 'Phone', 'phone_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'subdistribution_id' => null,
			'vendor_id' => null,
			'phone_id' => null,
			'subdistribution' => null,
			'vendor' => null,
			'phone' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('subdistribution_id', $this->subdistribution_id);
		$criteria->compare('vendor_id', $this->vendor_id);
		$criteria->compare('phone_id', $this->phone_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}