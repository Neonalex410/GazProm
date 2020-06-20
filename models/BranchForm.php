<?php


namespace app\models;


use yii\base\Model;

class BranchForm extends Model
{
    public $address;

    public function rules()
    {
        return [
            ['address', 'required'],
            ['address', 'unique', 'targetClass' => 'app\models\Branch'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'address' => 'Адрес филиала',
        ];
    }

    public function saveBranch(){
        $branch = new Branch();
        $branch->address = $this->address;
        $branch->save();
    }

    public function fillModel($id){
        $branch = Branch::findOne($id);
        $this->address = $branch->address;
    }

    public function updateBranch($id){
        $branch = Branch::findOne($id);
        $branch->address = $this->address;
        $branch->save();
    }

    public function deleteBranch($id){
        $branch = Branch::findOne($id);
        $branch->delete();
    }
}