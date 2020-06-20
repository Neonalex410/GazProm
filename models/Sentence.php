<?php


namespace app\models;


use yii\db\ActiveRecord;

class Sentence extends ActiveRecord
{
    public static function tableName()
    {
        return 'sentence';
    }
}