<?php

use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'publication_date',
            'title:ntext',
            'short_text:ntext',
            'full_text:ntext',
            // 'image_small',
            // 'image_large',
            // 'source',
            // 'hash',

            [
                'class' => ActionColumn::className(),
                'visibleButtons' => ['view' => true, 'update' => false, 'delete' => false],
            ],
        ],
    ]); ?>
</div>
