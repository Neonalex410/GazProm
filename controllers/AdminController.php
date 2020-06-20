<?php


namespace app\controllers;


use app\models\Branch;
use app\models\BranchForm;
use Yii;
use yii\web\Controller;

class AdminController extends Controller
{
    public function actionBranchCreate(){
        $branch_model = new BranchForm();
        if ($branch_model->load(Yii::$app->request->post()) && $branch_model->validate()){
            $branch_model->saveBranch();
            $this->redirect('branch-view');
        }
        return $this->render('branch-create', [
            'branch_model' => $branch_model,
        ]);
    }

    public function actionBranchView(){
        $branch = Branch::find()->all();
        return $this->render('branch-view', [
            'branch' => $branch,
        ]);
    }

    public function actionBranchUpdate($id){
        $branch_model = new BranchForm();
        $branch_model->fillModel($id);
        if ($branch_model->load(Yii::$app->request->post()) && $branch_model->validate()){
            $branch_model->updateBranch($id);
            $this->redirect('branch-view');
        }
        return $this->render('branch-update', [
            'branch_model' => $branch_model,
        ]);
    }

    public function actionBranchDelete($id){
        $branch_model = new BranchForm();
        $branch_model->deleteBranch($id);
        $this->redirect('branch-view');
    }
}