<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-view">

    <h2><?= Html::encode($this->title) ?></h2>
    <p><?= $model->publication_date ?></p>
    <img src="<?= $model->image_large ?>" alt="<?= $model->image_large ?>">
    <p>
        <?= $model->full_text ?>
    </p>

</div>
