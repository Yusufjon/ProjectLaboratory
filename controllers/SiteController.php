<?php

namespace app\controllers;

use app\models\TestQuestions;
use app\models\Tests;
use app\models\TestSubmission;
use app\models\YoutubeLessons;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public $layout='Project';
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

    public function actionTest()
    {
        Yii::$app->formatter->timeZone='Europe/Budapest';
      
      var_dump(date('H:i'));
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['user/login']);
        }

        /*hohlasek testlar orasidan random tanlab oladigon qilsek boladi, kuchli*/
        $test = Tests::find()->orderBy('id DESC')->one();
        $testQuestions = TestQuestions::findAll(['test_id'=>$test->id]);

        if ($this->request->isPost) {
            $postValues = Yii::$app->request->post();
            unset($postValues['_csrf']);
            $unique_id = time();
            foreach ($postValues['question'] as $question) {
                $getTestQuestion = TestQuestions::findOne($question);
                $testSubmission = new TestSubmission();
                $answer_id = "question_id_".$question;
                $testSubmission->test_id = $test->id;
                $testSubmission->question_id = $question;
                $testSubmission->answer_id = $postValues[$answer_id];
                $testSubmission->user_id = 1;
                $testSubmission->unique_id = $unique_id; 
                $testSubmission->datetime = date('Y-m-d H:i:s');
                if($getTestQuestion->correct_answer_index == $postValues[$answer_id]) {
                    $testSubmission->is_true= 1;
                } else {
                    $testSubmission->is_true= 0;
                }
                $testSubmission->save();
            }
            return $this->redirect(['test-results']);
        }
        return $this->render('test',[
            'test'=>$test,
            'testQuestions'=>$testQuestions,
        ]);
    }

    public function actionTestResults()
    {
       if (Yii::$app->user->isGuest) {
            return $this->redirect(['user/login']);
        }

        $submissions = TestSubmission::find()
            ->select('unique_id,test_id')
            ->where(['user_id'=>Yii::$app->user->id])
            ->groupBy(['unique_id','test_id'])
            ->all();

        return $this->render('test_results',[
            'submissions'=>$submissions
        ]);
    }

    public function actionMedia()
    {
        $medias = YoutubeLessons::find()->all();

        return $this->render('media',[
            'medias'=>$medias
        ]);
    }

    public function actionGame()
    {
        return $this->render('game');
    }

    public function actionCode()
    {
        return $this->render('code');
    }


    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
