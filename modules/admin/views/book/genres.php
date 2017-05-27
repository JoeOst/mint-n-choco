<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= Html::dropDownList('genres', $selectedGenres, $genres, ['class'=>'form-control', 'multiple' => true]) ?>
    <?= Html::checkboxList('genres', $selectedGenres, $genres,['class'=>'form-control', 'style'=>'margin-bottom:10px']) ?>





    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>