<?php

use \yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

?>

<div class="news-item">
    <div class="row">
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="<?= $model->image_small ?>" alt="<?= $model->image_small ?>">
                <div class="caption">
                    <h3><?= Html::encode($model->title) ?></h3>
                    <p><?= HtmlPurifier::process($model->short_text) ?></p>
                    <p><a href="<?= Url::toRoute(['article/view', 'id' => $model->id]) ?>" class="btn btn-primary"
                          role="button">Просмотреть</a>
                </div>
            </div>
        </div>
    </div>
</div>