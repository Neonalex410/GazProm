<?php


namespace app\models;


use yii\db\ActiveRecord;

class Branch extends ActiveRecord
{
    public static function tableName()
    {
        return 'branch';
    }
}