<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $agapeForm app\models\Agape */
?>

<div class="agape3-view">

    <h1><?= Html::encode('Agape Details') ?></h1>

    <?= DetailView::widget([
        'agapeForm' => $agapeForm,
        'attributes' => [
            'agape_id',
            'amount',
            'session_id',
        ],
    ]) ?>

</div>
