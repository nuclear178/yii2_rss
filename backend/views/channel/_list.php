<?php

use yii\helpers\Url;

?>

<a href="<?= Url::toRoute(['channel/view', 'id' => $model->id]) ?>" style="font-size: xx-large">
    <?= $model->title ?>
</a>
