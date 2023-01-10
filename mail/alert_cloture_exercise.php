<?php
$this->beginBlock('style')
?>
<style>
    body {
        font-family: 'sans-serif';
    }
    .title {
        margin-bottom: 10px;
        text-align: center;
        color: dodgerblue;
        font-size: 2rem;
    }
    .amount {
        font-size: 1.3rem;
        color: orangered;
    }
</style>
<?php $this->endBlock() ?>
<h1 class="title">Fin de l'exercice de <?= $exercise->year ?> !!!</h1>
<div>
    Bonjour <?= $user->first_name." ".$user->name ?>, Nous vous informons que l'exercice de <?= $exercise->year ?> vient de cloturer. Félicitation !!!
    <br>
    <?php
    $interest = $member->interest($exercise);
    $savedAmount = $member->savedAmount($exercise);
    $amount = $interest+$savedAmount;
    $amount = $amount?$amount:0;
    ?>
    Votre revenu pour cette exercice est de <span class="amount"><?= $amount ?> XAF</span>

</div>