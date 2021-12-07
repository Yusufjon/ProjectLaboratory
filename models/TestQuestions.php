<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "test_questions".
 *
 * @property int $id
 * @property int $test_id
 * @property int $question_title
 * @property int $correct_answer_index
 */
class TestQuestions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test_questions';
    }

    public $answer_title;
    public $correct_answer;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'question_title'], 'required'],
            [['test_id','correct_answer_index'], 'integer'],
            [['answer_title', 'correct_answer','question_title'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'test_id' => 'Test ID',
            'question_title' => 'Question Title',
        ];
    }

    public function getAnswers()
    {
        return $this->hasMany(TestAnswers::class, ['question_id' => 'id']);
    }

}
