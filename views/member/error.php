<?php


use yii\helpers\Html;

$this->title = 'Paiement réussi';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="payment-success">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Merci pour votre paiement ! Votre transaction a échoué car vous n'avez pas assez de fond.</p>
    <p>Numéro de transaction : <?= $transactionNumber ?></p>
</div>
