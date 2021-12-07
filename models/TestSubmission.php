<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "test_submission".
 *
 * @property int $id
 * @property int|null $test_id
 * @property int|null $question_id
 * @property int|null $answer_id
 * @property int|null $user_id
 * @property int|null $is_true
 * @property int|null $unique_id
 */
class TestSubmission extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test_submission';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['test_id', 'question_id', 'answer_id', 'user_id','is_true','unique_id'], 'integer'],
            [['datetime'],'safe'],
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
            'question_id' => 'Question ID',
            'answer_id' => 'Answer ID',
            'user_id' => 'User ID',
        ];
    }
}
