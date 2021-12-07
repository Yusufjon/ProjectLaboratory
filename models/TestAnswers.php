<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "test_answers".
 *
 * @property int $id
 * @property int|null $question_id
 * @property string $answer_title
 * @property int|null $is_correct
 * @property int|null $answer_index
 */
class TestAnswers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test_answers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['question_id', 'is_correct','answer_index'], 'integer'],
            [['answer_title'], 'required'],
            [['answer_title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question_id' => 'Question ID',
            'answer_title' => 'Answer Title',
            'is_correct' => 'Is Correct',
        ];
    }
}
