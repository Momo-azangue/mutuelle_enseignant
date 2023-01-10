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
</style>
<?php $this->endBlock() ?>
<h1 class="title">Nouvelle session</h1>
<div>
    Bonjour <?= $user->first_name." ".$user->name ?>, Nous vous informons qu'une nouvelle session a débuté,
    à la mutuelle de l'Ecole Nationale Supérieure Polytechnique.
    Il s'agit de la session N° <?= $session->number() ?> de l'exercice actuel.
</div>