<?php


namespace app\models;


use yii\base\Model;

class AccountForm extends Model
{
    public $image;
    public $name;
    public $id_branch;

    public function rules()
    {
        return [
            [['image', 'name'], 'string'],
            ['id_branch', 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'image' => 'Изображение',
            'name' => 'ФИО',
            'id_branch' => 'Филиал',
        ];
    }
}