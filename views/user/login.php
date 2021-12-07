<?php

use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
<div class="container">
    <div class="row justify-content-center align-items-center">

        <br>
        <br>
        <div class="form-light mt-20">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <?= $form->field($model, 'username', ['template' => '{input} {error} {hint}'])
                            ->textInput([
                                'autofocus' => true,
                                'class' => 'input-lg form-control',
                                'placeholder' => 'Enter login...',
                            ])->label(false); ?>
                        <?= $form->field($model, 'password', ['template' => '{input} {error} {hint}'])
                            ->passwordInput([
                                'autofocus' => true,
                                'class' => 'input-lg form-control',
                                'placeholder' => 'Enter password',
                            ])->label(false); ?>

                    </div>
                </div>

            </div>
            <button type="submit" class="btn btn-two">Login</button>
            <p><br/></p>

        </div>


    </div>
</div>


<?php ActiveForm::end(); ?>


