<?php


namespace app\models;


use yii\base\Model;
use yii\web\UploadedFile;

class ProfileForm extends Model
{
    public $username;
    public $image;
    public $name;
    public $id_branch;
    public $rating;
    public $id_achievement;

    public function rules()
    {
        return [
            [['username', 'image', 'name', 'id_achievement'], 'string'],
            ['rating', 'integer'],
            [['image', 'name', 'id_branch'], 'required'],
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

    public function saveImage(){
        $file = UploadedFile::getInstance($this, 'image');
        $file->name = \Yii::$app->user->getId() . '_' . date("d.m.Y.H.i.s") . '.' . $file->extension;
        $file->saveAs('../web/uploads/' . $file->name);
        $this->image = $file->name;
    }

    public function updateProfile($id){
        $user = User::findOne($id);
        $user->image = $this->image;
        $user->name = $this->name;
        $user->id_branch = $this->id_branch;
        $user->save();
    }
}