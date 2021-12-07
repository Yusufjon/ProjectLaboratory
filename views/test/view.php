<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Tests */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="container">
    <div style="padding-bottom: 100px;">
    <a href="<?=\yii\helpers\Url::to(['create-question','test_id'=>$model->id])?>">
        <button class="btn btn-primary float-right">Create new question</button>
    </a>
    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Question index</th>
            <th>Question</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($getQuestions as $index => $question): $index++ ?>
        <tr>
            <td><?=$index?></td>
            <td>
                <a href="<?=\yii\helpers\Url::to(['update-question','question_id'=>$question->id])?>">
                <?=$question->question_title?>
                </a>
            </td>
            <td>
                <a data-method="post" href="<?=\yii\helpers\Url::to(['delete','id'=>$question->id])?>">
                <button class="btn btn-danger">
                    Delete
                </button>
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>

<style>
    tr,td,th {
        text-align: center;
    }
</style>
