<?php
use yii\helpers\Url;
?>
<div class="col-md-3">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Топ-10 книжок:</h4>
        <div class="row">
            <ol>
                <?php foreach ($rating as $book): ?>
                <li class="">
                    <a href="<?=Url::toRoute(['site/view', 'id'=>$book->id]); ?>"><?=$book->title; ?></a>
                    <span>- <?=$book->rating; ?></span>
                </li>
                <?php endforeach;?>
            </ol>
        </div>
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Жанри:</h4>
        <div class="row">
            <div class="col-lg-8">
                <ul class="list-unstyled">
                    <?php foreach ($genres as $genre): ?>
                    <li><a href="<?=Url::toRoute(['site/genre', 'id'=>$genre->id]); ?>"><?=$genre->title;
                    ?></a>
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>

        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well
    <div class="well">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
    </div>
-->
</div>