<?php

/**
 * This is the model base class for the table "beneficiary_status".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "BeneficiaryStatus".
 *
 * Columns in table "beneficiary_status" available as properties of the model,
 * followed by relations of table "beneficiary_status" available as properties of the model.
 *
 * @property integer $id
 * @property string $name
 * @property string $create_date
 * @property string $deleted_at
 *
 * @property Beneficiary[] $beneficiaries
 */
abstract class BaseBeneficiaryStatus extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'beneficiary_status';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'BeneficiaryStatus|BeneficiaryStatuses', $n);
	}

	public static function representingColumn() {
		return 'name';
	}

	public function rules() {
		return array(
			array('name, create_date', 'required'),
			array('name', 'length', 'max'=>255),
			array('deleted_at', 'safe'),
			array('deleted_at', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, name, create_date, deleted_at', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'beneficiaries' => array(self::HAS_MANY, 'Beneficiary', 'status_id'),
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
			'beneficiaries' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('create_date', $this->create_date, true);
		$criteria->compare('deleted_at', $this->deleted_at, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}