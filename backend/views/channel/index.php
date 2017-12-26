<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ChannelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Channels';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="channel-index" style="overflow: auto;
overflow-y: hidden;">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Channel', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_list',
        ]
    ); ?>

</div>
