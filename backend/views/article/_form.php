<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'image_file')->fileInput() ?>

    <!--<?= $form->field($model, 'publication_date')->textInput() ?>-->

    <?= $form->field($model, 'title')->textInput() ?>

    <!--<?= $form->field($model, 'short_text')->textarea(['rows' => 6]) ?>-->

    <?= $form->field($model, 'full_text')->textarea(['rows' => 6]) ?>

    <!--<?= $form->field($model, 'image_small')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image_large')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'source')->textInput() ?>

    <?= $form->field($model, 'hash')->textInput(['maxlength' => true]) ?> -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
