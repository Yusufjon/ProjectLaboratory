<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Youtube Lessons';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="youtube-lessons-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Youtube Lessons', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'link',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
