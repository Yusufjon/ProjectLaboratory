<div id="page-wrap">

    <h1>Quiz for IT students</h1>

    <?php use yii\widgets\ActiveForm;

    $form = ActiveForm::begin(); ?>
        <ol>
            <?php foreach ($testQuestions as $index => $question): ?>
            <li>
                <h3><?=$question->question_title?></h3>
                <input type="hidden" name="question[]" value="<?=$question->id?>">
                <?php foreach ($question->answers as $answer): ?>
                    <br>
                <div>
                    <input type="radio" name="question_id_<?=$question->id?>" id="question-1-answers-<?=$answer->id?>" value="<?=$answer->answer_index?>"  required/>
                    <label for="question-1-answers-<?=$answer->id?>"><?=$answer->answer_title?> </label>
                </div>
                <?php endforeach;?>

            </li>
        <?php endforeach;?>



        </ol>

        <button type="submit" class="btn btn-primary">Submit quiz</button>

</div>
<?php ActiveForm::end(); ?>
<br>



















<style>
    *					{ margin: 0; padding: 0; }
    body				{ font: 14px Georgia, serif; }

    #page-wrap		    { width: 500px; margin: 0 auto; }

    h1                  { margin: 25px 0; font: 14px Georgia, Serif; text-transform: uppercase; letter-spacing: 3px; }

    #quiz input {
        vertical-align: middle;
    }

    #quiz ol {
        margin: 0 0 10px 20px;
    }

    #quiz ol li {
        margin: 0 0 20px 0;
    }

    #quiz ol li div {
        padding: 4px 0;
    }

    #quiz h3 {
        font-size: 17px; margin: 0 0 1px 0; color: #666;
    }

    #results {
        font: 44px Georgia, Serif;
    }
</style>