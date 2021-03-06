<?php

/**
 * This is the model base class for the table "donor".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Donor".
 *
 * Columns in table "donor" available as properties of the model,
 * followed by relations of table "donor" available as properties of the model.
 *
 * @property integer $id
 * @property string $name
 * @property string $logo_path
 * @property string $slogan_en
 * @property string $slogan_ar
 *
 * @property Distribution[] $distributions
 */
abstract class BaseDonor extends GxActiveRecord {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'donor';
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Donor|Donors', $n);
    }

    public static function representingColumn() {
        return 'name';
    }

    public function rules() {
        return array(
            array('name', 'length', 'max' => 255),
            array('logo_path, slogan_en, slogan_ar', 'safe'),
            array('name, logo_path, slogan_en, slogan_ar', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id, name, logo_path, slogan_en, slogan_ar', 'safe', 'on' => 'search'),
        );
    }

    public function relations() {
        return array(
            'distributions' => array(self::HAS_MANY, 'Distribution', 'donor_id'),
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
            'logo_path' => Yii::t('app', 'Logo Path'),
            'slogan_en' => Yii::t('app', 'Slogan En'),
            'slogan_ar' => Yii::t('app', 'Slogan Ar'),
            'distributions' => null,
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('logo_path', $this->logo_path, true);
        $criteria->compare('slogan_en', $this->slogan_en, true);
        $criteria->compare('slogan_ar', $this->slogan_ar, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
