<div class="container" style="margin-top: 100px">
    <h1 class="text-center">Test results</h1>
<table class="table table-striped">
    <thead>
    <tr>
        <th>Test unique id</th>
        <th>Test day</th>
        <th>Correct answers</th>
        <th>All questions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($submissions as $submission): ?>
    <?php
        $detail = \app\models\TestSubmission::find()->where(['unique_id'=>$submission->unique_id]);
        $question = \app\models\TestQuestions::find()->where(['test_id'=>$submission->test_id])->count();

        ?>
    <tr>
        <td><?=$submission->unique_id?></td>
        <td><?=$detail->one()->datetime?></td>
        <td><?=$detail->andWhere(['is_true'=>1])->count()?></td>
        <td><?=$question?></td>
    </tr>
    <?php endforeach; ?>

    </tbody>
</table>
</div>