<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <h1><?='#404 '?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        Сторінка, яку ви шукаєте видалена або взагалі не існує.
    </p>
    <p>
        Спробуйте зайти пізніше, якщо ви певні, що сторінка все-таки існує і це помилка серверу.
    </p>
    <p class="go-back-home"><a href="/">
            Повернутись на головну</a></p>

</div>
