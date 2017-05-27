<?php
use yii\helpers\Url;
?>
<article>
    <!-- First Book Post -->
    <h2 class="book-name">
        <a href="<?=Url::toRoute(['site/view', 'id'=>$book->id]);?>"><?=$book->title; ?></a>
    </h2>
    <!--            Тут буде оцінка -->
    <p class="lead">
        by <a href="<?=Url::toRoute(['site/person', 'id'=>$book->author->id]); ?>"><?=$book->author->name; ?></a>
    </p>
    <p><span class="glyphicon glyphicon-time"></span> Дата викладання <?=$book->getDate(); ?></p>
    <hr>
    <img class="img-responsive" style="width: 300px" src="<?=$book->getImage(); ?>" alt="">
    <hr>
    <p class="main-text"><?=$book->annotation; ?></p>
    <ul class="text-center pull-right">
        <li class="list-unstyled"><span class="glyphicon glyphicon-eye-open margin-right"></span><?= (int) $book->viewed;?></li>
    </ul>
    <a class="btn btn-success" href="<?=Url::toRoute(['site/view', 'id'=>$book->id]); ?>">Читати <span class="glyphicon glyphicon-chevron-right"></span></a>

    <hr>
</article>