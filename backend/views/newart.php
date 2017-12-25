<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form ActiveForm */
?>
<div class="newart">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'image_file') ?>
    <?= $form->field($model, 'publication_date') ?>
    <?= $form->field($model, 'title') ?>
    <?= $form->field($model, 'short_text') ?>
    <?= $form->field($model, 'full_text') ?>
    <?= $form->field($model, 'source') ?>
    <?= $form->field($model, 'image_small') ?>
    <?= $form->field($model, 'image_large') ?>
    <?= $form->field($model, 'hash') ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- newart -->
