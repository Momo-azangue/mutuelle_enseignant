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
<h1 class="title">Nouvelle aide à la mutuelle</h1>
<?php
$target = $help->member()->user();
$unit = $help->unit_amount;
?>
<div>
    Bonjour <?= $user->first_name." ".$user->name ?>, Nous vous informons qu'une nouvelle aide financière a été lancé à la mutuelle de
    L'Ecole Nationale Supérieure Polytechnique de Yaoundé.
    <br>
    En effet, votre collègue <?= $target->first_name." ".$target->name ?> nécessite une aide de type <span style="color: dodgerblue">"<?=$helpType->title?>"</span>.
    Ainsi une somme de <span class="amount"><?= $unit?$unit:0 ?> XAF</span> est attendu de votre part avant le <b><?= (new DateTime($help->limit_date))->format("d-m-Y") ?></b>
</div>