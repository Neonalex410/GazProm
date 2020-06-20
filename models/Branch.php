<?php


namespace app\models;


use yii\db\ActiveRecord;

class Branch extends ActiveRecord
{
    public static function tableName()
    {
        return 'branch';
    }

    public function getArray(){
        $branch = Branch::find()->all();
        $array = [];
        foreach ($branch as $el){
            $array[$el->id] = $el->address;
        }
        return $array;
    }
}