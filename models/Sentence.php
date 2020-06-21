<?php


namespace app\models;


use yii\db\ActiveRecord;

class Sentence extends ActiveRecord
{
    public static function tableName()
    {
        return 'sentence';
    }

    public function getName($id){
        $user = User::findOne($id);
        return $user->name;
    }
}