<?php


namespace app\models;


use yii\base\Model;

class RegistrationForm extends Model
{
    public $username;
    public $password;
    public $re_password;
    public $role;
    public $image;
    public $name;
    public $id_branch;
    public $rating;
    public $id_achievement;

    public function rules()
    {
        return [
            [['username', 'password', 're_password', 'role', 'image', 'name', 'id_branch', 'rating', 'id_achievement'], 'required'],
            ['re_password', 'validatePassword'],
            ['username', 'unique', 'targetClass' => 'app\models\User'],
        ];
    }
    public function validatePassword($attribute, $params){
        if ($this->password != $this->re_password){
            $this->addError($attribute, 'Прольи не совпадают');
        }
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',
            're_password' => 'Потворите пароль',
        ];
    }

    public function defaultParams(){
        $this->role = 'user';
        $this->image = 'default';
        $this->name = 'none';
        $this->id_branch = 0;
        $this->rating = 0;
        $this->id_achievement = 'none';
    }

    public function saveUser(){
        $user = new User();
        $user->role = $this->role;
        $user->username = $this->username;
        $user->password = sha1($this->password);
        $user->image = $this->image;
        $user->name = $this->name;
        $user->id_branch = $this->id_branch;
        $user->rating = $this->rating;
        $user->id_achievement = $this->id_achievement;
        $user->save();
    }

}