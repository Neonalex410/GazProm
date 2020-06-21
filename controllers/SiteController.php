<?php

namespace app\controllers;

use app\models\Branch;
use app\models\ProfileForm;
use app\models\RegistrationForm;
use app\models\Sentence;
use app\models\SentenceForm;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;

class SiteController extends Controller
{

    public $layout = 'default';
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionLogin(){
        $login_model = new LoginForm();
        if (Yii::$app->user->isGuest){
            if($login_model->load(Yii::$app->request->post()) && $login_model->validate()){
                Yii::$app->user->login($login_model->getUser(), 3600*24*30);
                $this->goHome();
            }
        }
        return $this->render('login', [
            'login_model' => $login_model,
        ]);
    }

    public function actionLogout(){
        Yii::$app->user->logout();
        $this->redirect('login');
    }


    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest){
            $user = User::find()->all();
            $sentence = Sentence::find()->all();
        }else{
            $this->redirect('login');
        }
        return $this->render('index',[
            'user' => $user,
            'sentence' => $sentence,
        ]);

    }

   public function actionRegistration(){
        $registration_model = new RegistrationForm();
        if ($registration_model->load(Yii::$app->request->post())){
            $registration_model->defaultParams();
            if ($registration_model->validate()){
                $registration_model->saveUser();
                $this->redirect('login');
            }
        }
        return $this->render('registration', [
            'registration_model' => $registration_model,
        ]);
   }

   public function actionProfile(){
        if (!Yii::$app->user->isGuest){
            $user = User::findOne(Yii::$app->user->getId());
        }else{
            $this->redirect('login');
        }
       return $this->render('profile', [
           'user' => $user,
       ]);
   }

   public function actionProfileUpdate($id){
        if (!Yii::$app->user->isGuest){
            $profile_model = new ProfileForm();
            $branch = new Branch();
            $array_branch = $branch->getArray();
            if ($profile_model->load(Yii::$app->request->post())){
                $profile_model->saveImage();
                if ($profile_model->validate()){
                    $profile_model->updateProfile($id);
                    $this->redirect('profile');
                }
            }
        }else{
            $this->redirect('login');
        }
        return $this->render('profile-update', [
            'profile_model' => $profile_model,
            'array_branch' => $array_branch,
        ]);
   }

   public function actionSentenceCreate($id){
        if (!Yii::$app->user->isGuest){
            $sentence_model = new SentenceForm();
               if ($sentence_model->load(Yii::$app->request->post())){
                   $sentence_model->secondaryField();
                   if ($sentence_model->validate()){
                       $sentence_model->saveSentence();
                       $this->redirect('index');
                   }
                }
        }else{
            $this->redirect('login');
        }
        return $this->render('sentence-create', [
            'sentence_model' => $sentence_model,
        ]);
   }

   public function actionWatchSentence($id){
        $sentence = Sentence::findOne($id);
        return $this->render('watch-sentence', [
            'sentence' => $sentence,
        ]);
   }
}
