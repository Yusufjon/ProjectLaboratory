<?php

/* @var $this \yii\web\View */
/* @var $content string */


\app\assets\ProjectAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title>Project lab</title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<!-- Fixed navbar -->
<div class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <!-- Button for smallest screens -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            <a class="navbar-brand" href="/">
                <img style="width:200px; margin-top: -25%;" src="/web/assets/images/logo.png" alt="Techro HTML5 template"></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav pull-right mainNav">
                <li class="c1 active"><a href="/">Home</a></li>
                <li class="c2 active"><a href="about.html">Read Me</a></li>

                <li class="c7"><a href="<?= \yii\helpers\Url::to(['user/create']) ?>">Signup </a></li>
                <?php if (!Yii::$app->user->isGuest) : ?>
                    <li class="c3"><a data-method="post" href="<?= \yii\helpers\Url::to(['user/logout']) ?>">Log out </a></li>
                <?php else: ?>
                    <li class="c3"><a href="<?= \yii\helpers\Url::to(['user/login']) ?>">Login </a></li>
                <?php endif; ?>



            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</div>
<!-- /.navbar -->


        <?= $content ?>

<?php
$this->registerJs( <<< EOT_JS_CODE
  jQuery(function(){
        jQuery('#camera_wrap_4').camera({
            transPeriod: 500,
            time: 3000,
            height: '600',
            loader: 'false',
            pagination: true,
            thumbnails: false,
            hover: false,
            playPause: false,
            navigation: false,
            opacityOnGrid: false,
            imagePath: 'web/assets/images/'
        });
    });
EOT_JS_CODE
);
?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
