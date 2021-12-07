<br>
    <textarea id="html" placeholder="HTML"></textarea>
    <textarea id="css" placeholder="CSS"></textarea>
    <textarea id="js" placeholder="JavaScript"></textarea>
    <iframe id="code"></iframe>



<?=$this->registerJsFile('/web/compiler.js', ['position' => \yii\web\View::POS_END]);?>

<style>
    body {
        text-align: center;
    }

    textarea {
        width: 32%;
        float: top;
        min-height: 250px;
        overflow: scroll;
        margin: auto;
        display: inline-block;
        background: #F4F4F9;
        outline: none;
        font-family: Courier, sans-serif;
        font-size: 14px;
    }

    iframe {
        bottom: 0;
        position: relative;
        width: 100%;
        height: 35em;
    }
</style>