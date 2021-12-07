
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="form-light mt-20">
                <?php use yii\helpers\Html;
                use yii\widgets\ActiveForm;

                $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
                <?php if ($model->isNewRecord) : ?>
                    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
                <?php else : ?>
                    <?= $form->field($model, 'tempPassword')->passwordInput(['placeholder' => 'Yangi parol']) ?>
                <?php endif;?>
                <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'role')->dropDownList([0=>'User']) ?>

                <?= $form->field($model, 'status')->dropDownList([
                    10=>'Active',
                    0=>'InActive'
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Sign up', ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

