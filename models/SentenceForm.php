<?php


namespace app\models;


use Yii;
use yii\base\Model;

class SentenceForm extends Model
{
    public $id_user;
    public $title;
    public $text;
    public $agree;
    public $dislike;
    public $date;
    public $status;

    public function rules()
    {
        return [
            [['id_user', 'title', 'text', 'agree', 'dislike', 'date', 'status'], 'required'],
            ['date','date','format' => 'php:d.m.Y'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Заголовок',
            'text' => 'Текст',
        ];
    }

    public function secondaryField(){
        $this->id_user = Yii::$app->user->getId();
        $this->agree = 0;
        $this->dislike = 0;
        $this->date = date('d.m.Y');
        $this->status = 'active';
    }

    public function saveSentence(){
        $sentence = new Sentence();
        $sentence->id_user = $this->id_user;
        $sentence->title = $this->title;
        $sentence->text = $this->text;
        $sentence->agree = $this->agree;
        $sentence->dislike = $this->dislike;
        $sentence->date = $this->date;
        $sentence->status = $this->status;
        $sentence->save();
    }
}