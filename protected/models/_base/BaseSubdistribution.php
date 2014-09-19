<?php

/**
 * This is the model base class for the table "subdistribution".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Subdistribution".
 *
 * Columns in table "subdistribution" available as properties of the model,
 * followed by relations of table "subdistribution" available as properties of the model.
 *
 * @property integer $id
 * @property string $code
 * @property string $start_date
 * @property string $end_date
 * @property integer $region_id
 * @property integer $distribution_id
 * @property integer $status_id
 * @property string $create_date
 * @property string $deleted_at
 * @property string $note
 *
 * @property DistributionVoucher[] $distributionVouchers
 * @property DistributionStatus $status
 * @property Community $region
 * @property Distribution $distribution
 * @property VendorMobile[] $vendorMobiles
 */
abstract class BaseSubdistribution extends GxActiveRecord {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'subdistribution';
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Subdistribution|Subdistributions', $n);
    }

    public static function representingColumn() {
        return 'code';
    }

    public function rules() {
        return array(
            array('code, start_date, region_id, distribution_id, status_id', 'required'),
            array('region_id, distribution_id, status_id', 'numerical', 'integerOnly' => true),
            array('code', 'length', 'max' => 25),
            array('end_date, create_date, deleted_at, note', 'safe'),
            array('end_date, create_date, deleted_at, note', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id, code, start_date, end_date, region_id, distribution_id, status_id, create_date, deleted_at, note', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'distributionVouchers' => array(self::HAS_MANY, 'DistributionVoucher', 'subdistribution_id'),
            'status' => array(self::BELONGS_TO, 'DistributionStatus', 'status_id'),
            'region' => array(self::BELONGS_TO, 'Community', 'region_id'),
            'distribution' => array(self::BELONGS_TO, 'Distribution', 'distribution_id'),
            'vendorMobiles' => array(self::HAS_MANY, 'VendorMobile', 'subdistribution_id'),
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
            'start_date' => Yii::t('app', 'Start Date'),
            'end_date' => Yii::t('app', 'End Date'),
            'region_id' => null,
            'distribution_id' => null,
            'status_id' => null,
            'create_date' => Yii::t('app', 'Create Date'),
            'deleted_at' => Yii::t('app', 'Deleted At'),
            'note' => Yii::t('app', 'Note'),
            'distributionVouchers' => null,
            'status' => null,
            'region' => null,
            'distribution' => null,
            'vendorMobiles' => null,
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('code', $this->code, true);
        $criteria->compare('start_date', $this->start_date, true);
        $criteria->compare('end_date', $this->end_date, true);
        $criteria->compare('region_id', $this->region_id);
        $criteria->compare('distribution_id', $this->distribution_id);
        $criteria->compare('status_id', $this->status_id);
        $criteria->compare('create_date', $this->create_date, true);
        $criteria->compare('deleted_at', $this->deleted_at, true);
        $criteria->compare('note', $this->note, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}