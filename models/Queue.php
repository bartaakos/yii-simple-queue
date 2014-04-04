<?php

Yii::import('application.models._base.BaseQueue');

class Queue extends BaseQueue
{
    const TYPE_MAIL = 10;

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function behaviors()
    {
        return array(
            'CSerializeBehavior' => array(
                'class' => 'vendor.bartaakos.CSerializeBehavior',
                'serialAttributes' => array('data'),
            )
        );
    }

    protected function beforeSave()
    {
        $this->create_time = new CDbExpression('NOW()');
        return parent::beforeSave();
    }
}