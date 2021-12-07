<?php

namespace app\controllers;

use app\models\TestAnswers;
use app\models\TestQuestions;
use app\models\Tests;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TestController implements the CRUD actions for Tests model.
 */
class TestController extends Controller
{
    /**
     * @inheritDoc
     */
    public $layout='main';
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Tests models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Tests::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tests model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $getQuestions = TestQuestions::findAll(['test_id'=>$id]);
        $questionModel = new TestQuestions();
            if ($questionModel->load($this->request->post()) && $questionModel->save()) {
                return $this->redirect(['view', 'id' => $questionModel->id]);
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
            'questionModel' => $questionModel,
            'getQuestions' => $getQuestions,
        ]);
    }

    public function actionCreateQuestion($test_id)
    {
        $questionModel = new TestQuestions();

        if ($questionModel->load($this->request->post()) ) {
            $questionModel->test_id = $test_id;
            if($questionModel->save()) {
                $answers = $questionModel->answer_title;
                foreach ($answers as $index => $answer) {
                    $answerModel = new TestAnswers();
                    $answerModel->question_id = $questionModel->id;
                    $answerModel->answer_index = $index;
                    $answerModel->answer_title = $answer;
                    $answerModel->is_correct =$questionModel->correct_answer_index;
                    $answerModel->save();
                }
            }

            return $this->redirect(['view', 'id' => $test_id]);
        }

        return $this->render('create_question', [
            'questionModel' => $questionModel,
        ]);
    }

    public function actionUpdateQuestion($question_id)
    {
        $questionModel = TestQuestions::findOne($question_id);
        $getanswers = TestAnswers::findAll(['question_id'=>$question_id]);
        if ($questionModel->load($this->request->post()) ) {
            if($questionModel->save()) {
                $answers = $questionModel->answer_title;
                foreach ($answers as $index => $answer) {
                    $answerModel =TestAnswers::findOne(
                        [
                            'question_id'=>$question_id,
                            'answer_index'=>$index
                        ]
                    );
                    $answerModel->question_id = $questionModel->id;
                    $answerModel->answer_index = $index;
                    $answerModel->answer_title = $answer;
                    $answerModel->is_correct =$questionModel->correct_answer_index;
                    $answerModel->save();
                }
            }

            return $this->redirect(['view', 'id' => $questionModel->test_id]);
        }

        return $this->render('update_question', [
            'questionModel' => $questionModel,
            'getanswers' => $getanswers,
        ]);
    }




    /**
     * Creates a new Tests model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tests();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tests model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tests model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = TestQuestions::findOne($id);

        if($model->delete()) {
            $answers = TestAnswers::deleteAll(['question_id'=>$model->id]);
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Tests model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tests the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tests::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
