<div class="container">
    <h1 class="text-center">IT tutorials</h1>

    <div class="row">
        <?php foreach ($medias as $media): ?>
        <div class="col-md-4" style="height: 600px">
            <iframe width="420" height="315"
                    src="https://www.youtube.com/embed/<?=$media->link?>">
            </iframe>
            <h3 class="text-center"><?=$media->name?></h3>
        </div>
        <?php endforeach;?>
    </div>
</div>