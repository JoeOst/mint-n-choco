<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\PublicAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

PublicAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-static-top my-nav" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="">

            <!-- logotype -->

            <img src="\public\images\logo.png" alt="logo" class="logo">
        </div>


        <ul class="nav navbar-nav nav-font text-center">
            <li>
                <a href="<?=Url::toRoute(['/'])?>">Головна</a>
            </li>
            <li>
                <a href="<?=Url::toRoute(['site/allbooks'])?>">Книги</a>
            </li>
            <li>
                <a href="<?=Url::toRoute(['site/authors'])?>">Автори</a>
            </li>

        </ul>
        <!-- Вхід реєстрація ? ще треба подумати к зробити. -->
        <button class="btn btn-success navbar-btn navbar-right">Ввійти</button>
        <!-- -->

        <form class="navbar-form navbar-right">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Пошук">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                </div>
            </div>
        </form>


    </div>
    <!-- /.container -->
</nav>


<!-- Page Content -->
<div class="container">

    <?= $content; ?>

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Mint&Choco 2017</p>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </footer>

</div>
<!--Кнопка вверх-->
    <a id="go-to-top" href="#" class="btn btn-success btn-lg go-to-top" role="button" title="Негайно вверх">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </a>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
