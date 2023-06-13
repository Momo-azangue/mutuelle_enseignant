<?php use yii\widgets\LinkPager;

$this->beginBlock('title') ?>
Mes emprunts
<?php $this->endBlock() ?>
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
<?php $this->endBlock() ?>

<div class="container mt-5 mb-5">
    <div class="row">
        
        <?php if ( count($exercises)):?>
            <div class="col-12 white-block mb-2">
        
                <?php
                $exercise = $exercises[0];
                $borrowings = $member->exerciseBorrowings($exercise);
                ?>
                    <h1 class="text-muted text-center">Exercice de l'année <span class="blue-text"><?= $exercises[0]->year ?></span></h1>
                    <h3 class="text-secondary text-center"><?= $exercises[0]->active?"En cours":"Terminé" ?></h3>
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
                            <th>Session d'emprunt</th>
                            <th>Date d'écheance</th>
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
                                    <td> <?= $session->date_d_écheance_emprunt() ?></th>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else:?>
                <h3 class="text-center text-muted">Aucun emprunt pour cet exercice.</h3>
                <?php endif; ?>

            </div>

        <?php else:?>
            <h3 class="text-center text-muted">Aucun exercice enregistré.</h3>
        <?php endif;?>

        <div class="col-12 p-2">
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

    </div>
</div>