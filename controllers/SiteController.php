<?php

namespace app\controllers;

use app\models\RegistrationForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
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
    public function actionIndex()
    {
        return $this->render('index');
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
        $this->goHome();
   }
}
