<?php

use yii\widgets\LinkPager;

$user = $member->user();
?>
<?php $this->beginBlock('title') ?>
<?= $user->name." ".$user->first_name ?>
<?php $this->endBlock()?>
<?php $this->beginBlock('style') ?>
<style>
    .img-container {
        display: inline-block;
        width: 150px;
        height: 150px;
    }
    .img-container img{
        width: 100%;
        height: 100%;
        border-radius: 1000px;
    }
    .white-block {
        padding: 20px;
        background-color: white;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.49);
    }

    .labels .col-7 {
        color: dodgerblue;
    }
</style>
<?php $this->endBlock()?>


<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-4 text-center">
            <div class="img-container">
                <img src="<?= \app\managers\FileManager::loadAvatar($user,"512")?>" alt="">
            </div>
            <h2 class="mt-2 text-capitalize"><?= $member->username?></h2>
        </div>
        <div class="col-md-8 white-block">
            <div class="row labels ">
                <div class="col-5">
                    Nom
                </div>
                <div class="col-7">
                    <?= $user->name ?>
                </div>
                <div class="col-5">
                    Prénom
                </div>
                <div class="col-7">
                    <?= $user->first_name ?>
                </div>
                <div class="col-5">
                    Téléphone
                </div>
                <div class="col-7">
                    <?= $user->tel ?>
                </div>
                <div class="col-5">
                    Email
                </div>
                <div class="col-7">
                    <?= $user->email ?>
                </div>
                <div class="col-5">
                    Fond social
                </div>
                <div class="col-7">
                    <?php if ($member->social_crown):
                        ?>
                        <span>Payé (<?= $member->social_crown ?>)</span>
                    <?php
                    else:
                        ?>
                        <span class="text-secondary">Non payé</span>
                    <?php
                    endif;
                    ?>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 text-right">
                    <?php
                    if ($member->active):
                        ?>
                        <a href="<?= Yii::getAlias("@administrator.disable_member")."?q=".$member->id ?>" class="btn btn-primary p-2">Désactiver le membre</a>
                    <?php
                    else:
                        ?>

                        <a href="<?= Yii::getAlias("@administrator.enable_member")."?q=".$member->id ?>" class="btn btn-primary p-2">Activer le membre</a>
                    <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12 white-block mb-2">
            <div class="row">
                <h5 class="col">
                    <a  class="black-link" href="<?= Yii::getAlias("@administrator.member")."?q=".$member->id ?>">Général</a>
                </h5>
                <h5 class="col">
                    <a class="black-link" href="<?= Yii::getAlias("@administrator.saving_member")."?q=".$member->id ?>">Epargnes</a>
                </h5>
                <h5 class="col">
                    <a href="<?= Yii::getAlias("@administrator.borrowing_member")."?q=".$member->id ?>">Emprunts</a>
                </h5>
                <h5 class="col">
                    <a class="black-link" href="<?= Yii::getAlias("@administrator.contribution_member")."?q=".$member->id ?>">Contributions</a>
                </h5>
            </div>
        </div>
        <div class="col-12 white-block">
            <?php if (count($exercises)): ?>
                <?php
                $exercise = $exercises[0];
                $borrowings = $member->exerciseBorrowings($exercise);
                ?>
                <h3 class="my-3 text-center">Exercice de <span class="text-secondary"><?= $exercise->year ?></span></h3>
                <?php if (count($borrowings)):?>

                    <table class="table table-hover">
                        <thead class="blue-grey lighten-4">
                        <tr>
                            <th>#</th>
                            <th>Montant emprunté</th>
                            <th>Intérêt</th>
                            <th>Montant total</th>
                            <th>Montant remboursé</th>
                            <th>Montant restant</th>
                            <th>Administrateur</th>
                            <th>Session</th>
                        </tr>

                        </thead>
                        <tbody>
                        <?php foreach ($borrowings as $index => $borrowing): ?>
                            <?php
                            $amount = $borrowing->amount;
                            $administrator = $borrowing->administrator()->user();
                            $session = $borrowing->session();
                            $intendedAmount = $borrowing->intendedAmount();
                            $refundedAmount = $borrowing->refundedAmount();
                            $interest = $borrowing->interest;
                            $rest = $intendedAmount-$refundedAmount;
                            ?>
                            <tr>
                                <th scope="row"><?= $index + 1 ?></th>
                                <td class="blue-text"><?= $amount ? $amount : 0 ?> XAF</td>
                                <td><?= $interest ?> %</td>
                                <td><?= $intendedAmount?$intendedAmount:0 ?> XAF</td>
                                <td><?= $refundedAmount?$refundedAmount:0 ?> XAF</td>
                                <td class="text-secondary"><?= $rest?$rest:0 ?> XAF</td>
                                <td class="text-capitalize"><?= $administrator->name." ". $administrator->first_name ?></td>
                                <td><?= $session->date() ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else:?>
                    <h3 class="text-center text-muted">Aucun emprunt pour cet exercice</h3>
                <?php endif; ?>



                <div class="mt-2 p-2">
                    <nav aria-label="Page navigation example">
                        <?= LinkPager::widget(['pagination' => $pagination,
                            'options' => [
                                'class' => 'pagination pagination-circle justify-content-center pg-blue mb-0',
                            ],
                            'pageCssClass' => 'page-item',
                            'disabledPageCssClass' => 'd-none',
                            'prevPageCssClass' => 'page-item',
                            'nextPageCssClass' => 'page-item',
                            'firstPageCssClass' => 'page-item',
                            'lastPageCssClass' => 'page-item',
                            'linkOptions' => ['class' => 'page-link']
                        ]) ?>
                    </nav>

                </div>

            <?php else: ?>
                <h3 class="text-center text-muted">Aucun exercice enregistré.</h3>
            <?php endif; ?>
        </div>
    </div>
</div>
