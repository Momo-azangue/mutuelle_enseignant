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
        font-size: 1.2rem;
        color: orangered;
    }
</style>
<?php $this->endBlock() ?>
<h1 class="title">Fin de la session N°<?=$session->number()?></h1>
<div>
    Bonjour <?= $user->first_name." ".$user->name ?>, Nous vous informons que la session N° <?= $session->number() ?> de l'exercice actuel,
    à la mutuelle de l'Ecole Nationale Supérieure Polytechnique, vient de cloturer.
    <br>
    <?php if ( ($borrowing=$member->activeBorrowing()) ):
        $refundedAmount = $borrowing->refundedAmount();
        $intendedAmount = $borrowing->intendedAmount();
        $a = $intendedAmount - $refundedAmount;
        ?>
    Votre dette actuelle à la mutuelle est de  <span class="amount"><?= $a?$a:0 ?> XAF</span>
    <?php endif;?>
</div>