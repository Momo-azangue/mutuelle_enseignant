<?php

$this->beginBlock('title') ?>
    Aides
<?php $this->endBlock() ?>
<?php $this->beginBlock('style') ?>
    <style>
        .img-container {
            display: inline-block;
            width: 200px;
            height: 200px;
        }
        .img-container img{
            width: 100%;
            height: 100%;
            border-radius: 1000px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.51);
        }

        .objective {
            font-size: 2rem;
            margin: 0px;
        }

        .contributed {
            font-size: 2rem;
            margin: 0px;
        }

        .comments {
            background: rgba(128, 128, 128, 0.33);
            color: gray;
            padding: 10px;
            border-radius: 5px;
        }

        .contribution {
            border-radius: 5px;
            border: 2px solid blueviolet;
            color: blueviolet;
            background-color: rgba(138, 43, 226, 0.16);
            padding: 5px;
            font-size: 1.1rem;
        }

        .contribution img {
            width: 40px;
            height: 40px;
            border-radius: 50px;
        }
        .contribution span {
            margin-left: 5px;
        }
    </style>
<?php $this->endBlock() ?>
<?php
$member = $help->member();
$user = $member->user();
$helpType = $help->helpType();
?>
<div class="container mb-5 mt-5">
    <div class="row">
        <div class="col-12 white-block">

            <div class="row mb-5 justify-content-center">
                <div class="col-md-4 text-center">
                    <h3 class="mb-2">Membre</h3>
                    <div class="img-container mb-2">
                        <img src="<?= \app\managers\FileManager::loadAvatar($user,"512") ?>" alt="">
                    </div>
                    <h2 class="text-primary"><?= $user->name." ".$user->first_name ?></h2>

                </div>
                <div class="col-md-8 text-center">
                    <h4 class="text-center text-muted"><?= $helpType->title ?></h4>
                    <p class="comments text-left"><?= $help->comments ?></p>
                    <h6 >Créée le : <?= $help->created_at ?></h6>
                    <p class="objective text-primary">Montant de l'aide : <?= $help->amount ?> XAF</p>
                    <h4 class="text-primary">Montant contribution : <?= $help->unit_amount ?> XAF / membre</h4>
                    <h4 class="text-secondary m-0 mt-4">Montant contributions perçus : </h4>
                    <p class="contributed text-secondary"><?= ($t=$help->contributedAmount())?$t:0 ?> XAF</p>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <h3 class="text-muted text-center">Détails</h3>
                    <?php
                    $contributions = $help->contributions();
                    if (count($contributions)):
                    ?>

                        <table class="table table-hover">
                            <thead class="blue-grey lighten-4">
                            <tr>
                                <th>#</th>
                                <th>Membre</th>
                                <th>Date</th>
                                <th>Administrateur</th>
                            </tr>

                            </thead>
                            <tbody>
                            <?php foreach ($contributions as $index => $contribution): ?>
                                <?php $m = $contribution->member();
                                $u = $m->user();
                                $administrator = $contribution->administrator();
                                $adminUser = $administrator->user();
                                ?>
                                <tr>
                                    <th scope="row"><?= $index + 1 ?></th>
                                    <td class="text-capitalize"><?= $u->name . " " . $u->first_name ?></td>
                                    <td class="blue-text"><?= (new DateTime($contribution->date))->format("d-m-Y")  ?></td>
                                    <td class="text-capitalize"><?= $adminUser->name. ' '.$adminUser->first_name ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>

                    <?php
                    else:?>
                    <p class="text-center">Aucune contribution</p>
                    <?php
                    endif;
                    ?>

                    <?php
                    if ($help->state):
                    ?>
                        <h3 class="text-muted text-center mb-3">Membres n'ayant pas contribué</h3>
                        <div class="row">
                            <?php
                            foreach ($help->waitedContributions() as $contribution ):
                            $member =$contribution->member();
                            $user = $member->user();
                            ?>

                            <div class="col-3">
                                <div class="contribution">
                                    <img src="<?= \app\managers\FileManager::loadAvatar($user)?>" alt="<?= $user->name.' '.$user->first_name ?>">
                                    <span><?= $user->name.' '.$user->first_name ?></span>
                                </div>
                            </div>

                            <?php
                            endforeach;
                            ?>
                        </div>

                    <?php
                    endif;
                    ?>
                </div>
            </div>

        </div>
    </div>
</div>