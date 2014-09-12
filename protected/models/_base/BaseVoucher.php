<?php

/**
 * This is the model base class for the table "voucher".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Voucher".
 *
 * Columns in table "voucher" available as properties of the model,
 * followed by relations of table "voucher" available as properties of the model.
 *
 * @property integer $id
 * @property string $code
 * @property integer $distribution_voucher_id
 * @property integer $ben_id
 * @property integer $vendor_id
 * @property integer $status_id
 * @property string $create_date
 * @property string $deleted_at
 * @property string $redeem_date
 *
 * @property Beneficiary $ben
 * @property DistributionVoucher $distributionVoucher
 * @property VoucherStatus $status
 * @property Vendor $vendor
 */
abstract class BaseVoucher extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'voucher';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Voucher|Vouchers', $n);
	}

	public static function representingColumn() {
		return 'code';
	}

	public function rules() {
		return array(
			array('code, distribution_voucher_id, status_id, create_date', 'required'),
			array('distribution_voucher_id, ben_id, vendor_id, status_id', 'numerical', 'integerOnly'=>true),
			array('code', 'length', 'max'=>15),
			array('deleted_at, redeem_date', 'safe'),
			array('ben_id, vendor_id, deleted_at, redeem_date', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, code, distribution_voucher_id, ben_id, vendor_id, status_id, create_date, deleted_at, redeem_date', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'ben' => array(self::BELONGS_TO, 'Beneficiary', 'ben_id'),
			'distributionVoucher' => array(self::BELONGS_TO, 'DistributionVoucher', 'distribution_voucher_id'),
			'status' => array(self::BELONGS_TO, 'VoucherStatus', 'status_id'),
			'vendor' => array(self::BELONGS_TO, 'Vendor', 'vendor_id'),
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
			'distribution_voucher_id' => null,
			'ben_id' => null,
			'vendor_id' => null,
			'status_id' => null,
			'create_date' => Yii::t('app', 'Create Date'),
			'deleted_at' => Yii::t('app', 'Deleted At'),
			'redeem_date' => Yii::t('app', 'Redeem Date'),
			'ben' => null,
			'distributionVoucher' => null,
			'status' => null,
			'vendor' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('code', $this->code, true);
		$criteria->compare('distribution_voucher_id', $this->distribution_voucher_id);
		$criteria->compare('ben_id', $this->ben_id);
		$criteria->compare('vendor_id', $this->vendor_id);
		$criteria->compare('status_id', $this->status_id);
		$criteria->compare('create_date', $this->create_date, true);
		$criteria->compare('deleted_at', $this->deleted_at, true);
		$criteria->compare('redeem_date', $this->redeem_date, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}