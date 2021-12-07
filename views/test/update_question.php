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
<?php $form = ActiveForm::begin(); ?>
<div class="tests-view">
    <h2 class="text-center">Question name</h2>
    <?= $form->field($questionModel, 'question_title')->textInput(['maxlength' => true])->label(false) ?>

<h2 class="text-center">Answers</h2>
    <?php foreach ($getanswers as $i => $answer):  ?>
    <div class="row">
      <div class="col-md-1">
          <p class="text-xl-right">Answer N:<?=$i?>  </p>
      </div>
        <div class="col-md-11">
             <?= $form->field($questionModel, "answer_title[]")->textInput(['value' => $answer->answer_title])->label(false) ?>
        </div>
    </div>
    <?php endforeach; ?>

    <h2 class="text-center">Correct answer</h2>

    <?= $form->field($questionModel, 'correct_answer_index')->dropDownList(
            [
                0=>'Answer 0',
                1=>'Answer 1',
                2=>'Answer 2',
                3=>'Answer 3',
            ]
    )->label(false) ?>
    <center>
        <button class="btn btn-primary" type="submit">Update question</button>
    </center>
    <?php ActiveForm::end(); ?>

</div>
