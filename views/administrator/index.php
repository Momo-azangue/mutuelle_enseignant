<?php

use yii\helpers\Html;
use yii\grid\GridView;

?>

<div class="agape3-index">

    <h1><?= Html::encode('Agape3 List') ?></h1>

    <p>
        <?= Html::a('Create Agape3', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'agape_id',
            'amount',
            'session_id',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
            ],
        ],
    ]); ?>

</div>
