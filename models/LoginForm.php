<?php


namespace app\models;


use yii\base\Model;

class LoginForm extends Model
{
    public $username;
    public $password;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['username', 'validateUsername'],
            ['password', 'validatePassword'],
        ];
    }

    public function validateUsername($attribute, $params){
        $user = $this->getUser();
        if (!$user){
            $this->addError($attribute, 'Имя пользователя введено неверно');
        }
    }

    public function validatePassword($attribute, $params){
        $user = $this->getUser();
        if ($user && $user->password != sha1($this->password)){
            $this->addError($attribute, 'Пароль введён неверно');
        }
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',
        ];
    }

    public function getUser(){
        return User::findOne(['username' => $this->username]);
    }
}