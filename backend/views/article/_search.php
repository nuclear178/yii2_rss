<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ArticleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'publication_date') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'short_text') ?>

    <?= $form->field($model, 'full_text') ?>

    <?php // echo $form->field($model, 'image_small') ?>

    <?php // echo $form->field($model, 'image_large') ?>

    <?php // echo $form->field($model, 'source') ?>

    <?php // echo $form->field($model, 'hash') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
