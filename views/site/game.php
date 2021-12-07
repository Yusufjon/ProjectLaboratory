<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="flex-container">
    <div class="flex-item">
        <h1 id="game-title"> Memory Game </h1>
    </div>
    <div class="flex-item">
        <h1 id="score"> Current tries is : <span id="result"></span></h1>
    </div>
</div>
<div>
    <section class='memory-game' id='memory-game'>
        <div class='memory-card' data-framework='aurelia' >
            <img class="front-face" src="/web/img/aurelia.svg"
                 alt="Aurelia" />
            <img class="back-face" src="/web/img/question_mark.jpg"
                 alt="JS Badge" />
        </div>
        <div class='memory-card' data-framework='aurelia'>
            <img class="front-face" src="/web/img/aurelia.svg"
                 alt="Aurelia" />
            <img class="back-face" src="/web/img/question_mark.jpg"
                 alt="JS Badge" />
        </div>
        <div class='memory-card' data-framework='angular'>
            <img class="front-face" src="/web/img/angular.svg"
                 alt="Angular" />
            <img class="back-face" src="/web/img/question_mark.jpg"
                 alt="JS Badge" />
        </div>
        <div class='memory-card'  data-framework='angular'>
            <img class="front-face" src="/web/img/angular.svg"
                 alt="Angular" />
            <img class="back-face" src="/web/img/question_mark.jpg"
                 alt="JS Badge" />
        </div>
        <div class='memory-card'  data-framework='backbone'>
            <img class="front-face" src="/web/img/backbone.svg"
                 alt="Backbone" />
            <img class="back-face" src="/web/img/question_mark.jpg"
                 alt="JS Badge" />
        </div>
        <div class='memory-card' data-framework='backbone'>
            <img class="front-face" src="/web/img/backbone.svg"
                 alt="Backbone" />
            <img class="back-face" src="/web/img/question_mark.jpg"
                 alt="JS Badge" />
        </div>
        <div class='memory-card' data-framework='ember'>
            <img class="front-face" src="/web/img/ember.svg"
                 alt="Ember" />
            <img class="back-face" src="/web/img/question_mark.jpg"
                 alt="JS Badge" />
        </div>
        <div class='memory-card' data-framework='ember'>
            <img class="front-face" src="/web/img/ember.svg"
                 alt="Ember" />
            <img class="back-face" src="/web/img/question_mark.jpg"
                 alt="JS Badge" />
        </div>
        <div class='memory-card' data-framework='react'>
            <img class="front-face" src="/web/img/react.svg"
                 alt="React" />
            <img class="back-face" src="/web/img/question_mark.jpg"
                 alt="JS Badge" />
        </div>
        <div class='memory-card' data-framework='react'>
            <img class="front-face" src="/web/img/react.svg"
                 alt="React" />
            <img class="back-face" src="/web/img/question_mark.jpg"
                 alt="JS Badge" />
        </div>
        <div class='memory-card' data-framework="svg">
            <img class="front-face" src="/web/img/vue.svg"
                 alt="Vue" />
            <img class="back-face" src="/web/img/question_mark.jpg"
                 alt="JS Badge" />
        </div>
        <div class='memory-card' data-framework="svg">
            <img class="front-face" src="/web/img/vue.svg"
                 alt="Vue" />
            <img class="back-face" src="/web/img/question_mark.jpg"
                 alt="JS Badge" />
        </div>
        <div class='memory-card' data-framework='penguin' >
            <img class="front-face" src="/web/img/penguin.svg"
                 alt="Penguin" />
            <img class="back-face" src="/web/img/question_mark.jpg"
                 alt="JS Badge" />

        </div>
        <div class='memory-card' data-framework='penguin'>
            <img class="front-face" src="/web/img/penguin.svg"
                 alt="Penguin" />
            <img class="back-face" src="/web/img/question_mark.jpg"
                 alt="JS Badge" />
        </div>
        <div class='memory-card' data-framework='printer' >
            <img class="front-face" src="/web/img/printer.svg"
                 alt="Printer" />
            <img class="back-face" src="/web/img/question_mark.jpg"
                 alt="JS Badge" />
        </div>
        <div class='memory-card' data-framework='printer'>
            <img class="front-face" src="/web/img/printer.svg"
                 alt="Printer" />
            <img class="back-face" src="/web/img/question_mark.jpg"
                 alt="JS Badge" />
        </div>
        <div class='memory-card' data-framework='laptop' >
            <img class="front-face" src="/web/img/laptop.svg"
                 alt="Laptop" />
            <img class="back-face" src="/web/img/question_mark.jpg"
                 alt="JS Badge" />
        </div>
        <div class='memory-card' data-framework='laptop'>
            <img class="front-face" src="/web/img/laptop.svg"
                 alt="Laptop" />
            <img class="back-face" src="/web/img/question_mark.jpg"
                 alt="JS Badge" />
        </div>
        <div class='memory-card' data-framework='mouse'>
            <img class="front-face" src="/web/img/mouse.svg"
                 alt="Mouse" />
            <img class="back-face" src="/web/img/question_mark.jpg"
                 alt="JS Badge" />
        </div>
        <div class='memory-card' data-framework='mouse'>
            <img class="front-face" src="/web/img/mouse.svg"
                 alt="Mouse" />
            <img class="back-face" src="/web/img/question_mark.jpg"
                 alt="JS Badge" />
        </div>
    </section>
    <div class="vertical-center">
        <button class='button-6' type="reset" onclick="restart()" >Reset</button>
    </div>

    <?=$this->registerJsFile('/web/game.js', ['position' => \yii\web\View::POS_END]);?>


<style>
    *{
        padding:  0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        height: 100vh;
        display: flexbox;
        background-color: #060AB2;
        /* background-color: white; */
    }

    h1 {
        margin: 20px;
        color : white;
        font-size: 40px;
    }

    #game-title {
        margin-left: 100px;
    }

    /* CSS */
    .button-6 {
        align-items: center;
        background-color: #FFFFFF;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: .25rem;
        box-shadow: rgba(0, 0, 0, 0.02) 0 1px 3px 0;
        box-sizing: border-box;
        color: rgba(0, 0, 0, 0.85);
        cursor: pointer;
        display: inline-flex;
        font-family: system-ui,-apple-system,system-ui,"Helvetica Neue",Helvetica,Arial,sans-serif;
        font-size: 16px;
        font-weight: 600;
        justify-content: center;
        line-height: 1.25;
        margin: 0;
        min-height: 3rem;
        padding: calc(.875rem - 1px) calc(1.5rem - 1px);
        position: relative;
        text-decoration: none;
        transition: all 250ms;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        vertical-align: baseline;
        width: auto;
    }

    .button-6:hover,
    .button-6:focus {
        border-color: rgba(0, 0, 0, 0.15);
        box-shadow: rgba(0, 0, 0, 0.1) 0 4px 12px;
        color: rgba(0, 0, 0, 0.65);
    }

    .button-6:hover {
        transform: translateY(-1px);
    }

    .button-6:active {
        background-color: #F0F0F1;
        border-color: rgba(0, 0, 0, 0.15);
        box-shadow: rgba(0, 0, 0, 0.06) 0 2px 4px;
        color: rgba(0, 0, 0, 0.65);
        transform: translateY(0);
    }

    #score {
        margin-left: 500px;
    }

    .flex-container {
        display: flex;
        flex-wrap: nowrap;
    }

    .flex-item {
        margin: 10px;
        font-family: Verdana, Geneva, sans-serif;
        font-size: 30px;
        color: white;
    }

    .memory-game{
        width: 640px;
        height: 640px;
        margin: auto;
        display: flex;
        flex-wrap: wrap;
        perspective: 1000px;
    }

    .memory-card{
        width: calc(20% - 10px);
        height: calc(33.333%-10px);
        margin: 5px;
        position: relative;
        transform: scale(1);
        transform-style: preserve-3d;
        transition: transform .5s;
    }

    .memory-card:active{
        transform: scale(.97);
        transition: transform .2s;
    }

    .memory-card.flip{
        transform: rotateY(180deg);
    }


    .front-face,
    .back-face{
        width: 100%;
        height: 100%;
        padding: 20px;
        position : absolute;
        border-radius: 5px;
        background: #1c7ccc;
        backface-visibility: hidden;
    }

    .front-face{
        transform: rotateY(180deg);
    }

    .vertical-center {
        margin: 0;
        position: absolute;
        left: 50%;
        -ms-transform: translateY(-50%,-50%);
        transform: translateY(-50%,-50%);
    }
</style>
