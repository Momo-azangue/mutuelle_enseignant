<?php use yii\widgets\LinkPager;

$this->beginBlock('title') ?>
Exercices
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
                <h1 class="text-muted text-center">Exercice de l'année <span class="blue-text"><?= $exercises[0]->year ?></span></h1>
                <h3 class="text-secondary text-center"><?= $exercises[0]->active?"En cours":"Terminé" ?></h3>

                <table class="table table-hover">
                    <thead class="blue-grey lighten-4">
                        <tr>
                            
                            <th>Montant épargné</th>
                            <th>Montant emprunté</th>
                            <th>Montant remboursé</th>
                            <th>Intérêt</th>
                            <th>Total obtenu</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php foreach ($exercises as $index => $exercise): ?>
                        <?php
                        $savedAmount = $member->savedAmount($exercise);
                        $borrowingAmount = $member->borrowedAmount($exercise);
                        $refundedAmount = $member->refundedAmount($exercise);
                        $interest = $member->interest($exercise);

                        $total = $savedAmount+$interest;
                        ?>
                            <tr>
                                
                                <td><?= $savedAmount?$savedAmount:0 ?> XAF</td>
                                <td><?= $borrowingAmount?$borrowingAmount:0 ?> XAF</td>
                                <td><?= $refundedAmount?$refundedAmount:0 ?> XAF</td>
                                <td><?= $interest?$interest:0 ?> XAF</td>
                                <td class="blue-text"><?= $exercise->active?"###": ($total .' XAF') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else:?>
            <div class="col-12 white-block">
                <h1 class="text-center text-muted">Aucun exercice créé</h1>
            </div>
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