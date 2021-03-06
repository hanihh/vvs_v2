<?php

/**
 * This is the model base class for the table "voucher_type".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "VoucherType".
 *
 * Columns in table "voucher_type" available as properties of the model,
 * followed by relations of table "voucher_type" available as properties of the model.
 *
 * @property integer $id
 * @property string $name
 * @property string $create_date
 * @property string $deleted_at
 * @property integer $program_id
 * @property string $arabic_text
 * @property string $english_text
 *
 * @property DistributionVoucher[] $distributionVouchers
 * @property Program $program
 */
abstract class BaseVoucherType extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'voucher_type';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'VoucherType|VoucherTypes', $n);
	}

	public static function representingColumn() {
		return 'name';
	}

	public function rules() {
		return array(
			array('name', 'required'),
			array('program_id', 'numerical', 'integerOnly'=>true),
			array('name, arabic_text, english_text', 'length', 'max'=>255),
			array('create_date, deleted_at', 'safe'),
			array('create_date, deleted_at, program_id, arabic_text, english_text', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, name, create_date, deleted_at, program_id, arabic_text, english_text', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'distributionVouchers' => array(self::HAS_MANY, 'DistributionVoucher', 'type_id'),
			'program' => array(self::BELONGS_TO, 'Program', 'program_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'name' => Yii::t('app', 'Name'),
			'create_date' => Yii::t('app', 'Create Date'),
			'deleted_at' => Yii::t('app', 'Deleted At'),
			'program_id' => null,
			'arabic_text' => Yii::t('app', 'Arabic Text'),
			'english_text' => Yii::t('app', 'English Text'),
			'distributionVouchers' => null,
			'program' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('create_date', $this->create_date, true);
		$criteria->compare('deleted_at', $this->deleted_at, true);
		$criteria->compare('program_id', $this->program_id);
		$criteria->compare('arabic_text', $this->arabic_text, true);
		$criteria->compare('english_text', $this->english_text, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}