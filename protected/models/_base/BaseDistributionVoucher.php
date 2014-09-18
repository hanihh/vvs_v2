<?php

/**
 * This is the model base class for the table "distribution_voucher".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "DistributionVoucher".
 *
 * Columns in table "distribution_voucher" available as properties of the model,
 * followed by relations of table "distribution_voucher" available as properties of the model.
 *
 * @property integer $id
 * @property integer $subdistribution_id
 * @property integer $type_id
 * @property string $expiration_date
 * @property string $create_date
 * @property string $deleted_at
 * @property double $value
 *
 * @property Subdistribution $subdistribution
 * @property VoucherType $type
 * @property Voucher[] $vouchers
 */
abstract class BaseDistributionVoucher extends GxActiveRecord {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'distribution_voucher';
    }

    public static function label($n = 1) {
        return Yii::t('app', 'DistributionVoucher|DistributionVouchers', $n);
    }

    public static function representingColumn() {
        return 'expiration_date';
    }

    public function rules() {
        return array(
            array('subdistribution_id, type_id, expiration_date, create_date', 'required'),
            array('subdistribution_id, type_id', 'numerical', 'integerOnly' => true),
            array('value', 'numerical'),
            array('deleted_at', 'safe'),
            array('deleted_at, value', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id, subdistribution_id, type_id, expiration_date, create_date, deleted_at, value', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'subdistribution' => array(self::BELONGS_TO, 'Subdistribution', 'subdistribution_id'),
            'type' => array(self::BELONGS_TO, 'VoucherType', 'type_id'),
            'vouchers' => array(self::HAS_MANY, 'Voucher', 'distribution_voucher_id'),
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
            'type_id' => null,
            'expiration_date' => Yii::t('app', 'Expiration Date'),
            'create_date' => Yii::t('app', 'Create Date'),
            'deleted_at' => Yii::t('app', 'Deleted At'),
            'value' => Yii::t('app', 'Value'),
            'subdistribution' => null,
            'type' => null,
            'vouchers' => null,
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('subdistribution_id', $this->subdistribution_id);
        $criteria->compare('type_id', $this->type_id);
        $criteria->compare('expiration_date', $this->expiration_date, true);
        $criteria->compare('create_date', $this->create_date, true);
        $criteria->compare('deleted_at', $this->deleted_at, true);
        $criteria->compare('value', $this->value);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
