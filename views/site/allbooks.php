<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?><div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-9">

        <h1 class="page-header">
            Усі книги:
        </h1>

        <?php

        foreach ($books as $book):?>
            <!-- Вивід книжок -->
            <?= $this->render('/partials/article.php', [
                'book' => $book
            ]);?>
        <?php endforeach;?>


        <!-- Pager -->
        <?php
        echo LinkPager::widget([
            'pagination' => $pagination,
        ]);
        ?>

    </div>

    <!-- Blog Sidebar Widgets Column -->
    <?= $this->render('/partials/sidebar.php', [
        'rating' => $rating,
        'genres' => $genres,
    ]);?>

</div>
<!-- /.row -->