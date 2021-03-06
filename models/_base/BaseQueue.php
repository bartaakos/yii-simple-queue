<?php

/**
 * This is the model base class for the table "queue".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Queue".
 *
 * Columns in table "queue" available as properties of the model,
 * and there are no model relations.
 *
 * @property string $id
 * @property integer $type
 * @property string $associated_id
 * @property string $data
 * @property string $create_time
 *
 */
abstract class BaseQueue extends GxActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'queue';
    }

    public static function label($n = 1) {
        return Yii::t('app', 'Queue|Queues', $n);
    }

    public static function representingColumn() {
        return 'data';
    }

    public function rules() {
        return array(
            array('type, data', 'required'),
            array('type', 'numerical', 'integerOnly'=>true),
            array('associated_id', 'length', 'max'=>10),
            array('create_time', 'safe'),
            array('associated_id, create_time', 'default', 'setOnEmpty' => true, 'value' => null),
            array('id, type, associated_id, data, create_time', 'safe', 'on'=>'search'),
        );
    }

    public function relations() {
        return array(
        );
    }

    public function pivotModels() {
        return array(
        );
    }

    public function attributeLabels() {
        return array(
            'id' => Yii::t('app', 'ID'),
            'type' => Yii::t('app', 'Type'),
            'associated_id' => Yii::t('app', 'Associated'),
            'data' => Yii::t('app', 'Data'),
            'create_time' => Yii::t('app', 'Create Time'),
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('type', $this->type);
        $criteria->compare('associated_id', $this->associated_id, true);
        $criteria->compare('data', $this->data, true);
        $criteria->compare('create_time', $this->create_time, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
}