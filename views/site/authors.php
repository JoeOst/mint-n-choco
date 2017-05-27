<?php
use yii\helpers\Url;
?><div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-9">

        <div class="well">
            <div class="lead alphabet">
                <?php foreach ($letters as $letter): ?>
                <a href="#<?=$letter; ?>"><?=$letter;?></a>
                <?php endforeach;?>


            </div>
        </div>


        <?php foreach ($authors as $author): ?>

        <div class="container" >
            <h2 class="book-name" >
            <a name = "<?= substr($author->name,0,1); ?>" href="<?=Url::toRoute(['site/person', 'id'=>$author->id]); ?>"><?=$author->name; ?></a>
            </h2>
            


            <a class="btn btn-success" href="<?=Url::toRoute(['site/person', 'id'=>$author->id]); ?>">Переглянути <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>
        </div>
        <?php endforeach;?>

    </div>

    <!-- Blog Sidebar Widgets Column -->
    <?= $this->render('/partials/sidebar.php', [
        'rating' => $rating,
        'genres' => $genres,
    ]);?>
</div>
<!-- /.row -->