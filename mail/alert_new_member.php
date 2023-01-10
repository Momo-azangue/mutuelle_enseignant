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
<h1 class="title">Vous êtes un membre de la mutuelle !!!</h1>
<div>
    <?php
    $administrator = $member->administrator();
    $uAd = $administrator->user();
    ?>
    Bonjour <?= $user->first_name." ".$user->name ?>, Nous vous informons que vous maintenant membre
    de la mutuelle des enseignants de l'Ecole Nationale Supérieure Polytechnique.
    <br>
    Contactez l'administrateur <b style="font-size: 1.2rem"><?= $uAd->first_name." ".$uAd->name ?></b>, par email à l'adresse  <a href="mailto:<?= $uAd->email ?>"><?= $uAd->email ?></a> ou par téléphone
    au  <span style="color: dodgerblue"><?= $uAd->tel ?></span>, pour avoir les informations sur vos paramètres d'authentification à la plate-forme.
</div>