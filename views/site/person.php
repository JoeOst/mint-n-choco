<div class="row">


    <div class="col-lg-9">


        <h1><?= $author->name; ?></h1>
        <h4><?=$author->getBirth(); ?></h4>


        <!-- Photo author -->
        <img class="img-responsive" style="width: 100px" src="<?= $author->getImage(); ?>" alt="">

        <hr>

        <!-- Biography -->
        <h3>Про автора</h3>
        <p class="main-text"><?=$author->biography; ?></p>

        <hr>

        <!-- List of all book this author -->
        <h2>Список книжок:</h2>
        <?php foreach ($books as $book):?>
            <!-- Вивід книжок -->
            <?= $this->render('/partials/article.php', [
                'book' => $book
            ]);?>

        <?php endforeach;?>

    </div>

    <!-- Blog Sidebar Widgets Column -->
    <?= $this->render('/partials/sidebar.php', [
        'rating' => $rating,
        'genres' => $genres,
    ]);?>

</div>
<!-- /.row -->