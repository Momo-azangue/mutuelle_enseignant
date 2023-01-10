<?php use yii\widgets\LinkPager;

$this->beginBlock('title') ?>
Exercices
<?php $this->endBlock() ?>
<?php $this->beginBlock('style') ?>
<style>
    .bl {
        border: 3px solid;
        padding: 5px 10px;
        margin-bottom: 10px;
        border-radius: 5px;
    }
    .bl h2 {
        text-align: right;
    }

    .b-amount {
        border-color: dodgerblue;
        color: dodgerblue;
        background-color: rgba(30, 144, 255, 0.17);
    }
    
    .b-saved {
        border-color: blueviolet;
        color: blueviolet;
        background-color: rgba(138, 43, 226, 0.22);
    }
    .b-borrowed {
        border-color: darkviolet;
        color: darkviolet;
        background-color: rgba(148, 0, 211, 0.34);
    }
    .b-refunded {
        border-color: mediumvioletred;
        color: mediumvioletred;
        background-color: rgba(199, 21, 133, 0.38);
    }
    .b-interest {
        border-color: red;
        color: red;
        background-color: rgba(255, 0, 0, 0.3);
    }
</style>
<?php $this->endBlock() ?>

<div class="container mt-5 mb-5">
    <div class="row">
        <?php
        $labels = [];
        $data = [];
        $colors = [];
        ?>

        <?php if(count($exercises)):?>

            <?php
            $exercise = $exercises[0];
            $members = \app\models\Member::find()->all();  ?>

            <div class="col-12 white-block mb-2">
                <h1 class="text-muted text-center">Exercice de l'année <span class="blue-text"><?= $exercises[0]->year ?></span></h1>
                <h3 class="text-secondary text-center"><?= $exercises[0]->active?"En cours":"Terminé" ?></h3>
            </div>

            <div class="col-12 mb-2">
                <div class="row">
                    <?php
                    if (count($members)):
                    ?>
                    <div class="col-md-8 p-1">
                        <div class="white-block">
                            <h3 class="my-3 text-center">Répartion des intérêts</h3>
                            <canvas id="pieChart"></canvas>
                        </div>
                        <div class="white-block mt-2">
                            <h3 class="my-3 text-center">Evolution des entrées durant l'exercice</h3>
                            <canvas id="lineChart"></canvas>
                        </div>
                    </div>
                    <?php
                    endif;
                    ?>

                    <div class="col-md-4 p-1">
                        <div class="white-block">
                            <div class="bl b-amount">
                                <h5>Fond total</h5>
                                <h2><?= ($t=$exercise->exerciseAmount())?$t:0 ?> XAF</h2>
                            </div>
                            
                            <div class="bl b-saved">
                                <h5>Montant épargné</h5>
                                <h2><?= ($t=$exercise->totalSavedAmount())?$t:0 ?> XAF</h2>
                            </div>
                            <div class="bl b-borrowed">
                                <h5>Montant emprunté</h5>
                                <h2><?= ($t=$exercise->totalBorrowedAmount())?$t:0 ?> XAF</h2>
                            </div>
                            <div class="bl b-refunded">
                                <h5>Montant remboursé</h5>
                                <h2><?= ($t=$exercise->totalRefundedAmount()) ?$t:0 ?> XAF</h2>
                            </div>
                            <div class="bl b-interest">
                                <h5>Intérêt produit</h5>
                                <h2><?= ($t=$exercise->interest())?$t:0 ?> XAF</h2>
                            </div>
                        </div>
                    </div>

                </div>
            </div>



            <?php if ( count($members) ):?>
                <div class="col-12 white-block">

                    <h3 class="text-center my-4 blue-text">Bilan de l'exercice</h3>

                    <table class="table table-hover">
                        <thead class="blue-grey lighten-4">
                        <tr>
                            <th>Membre</th>
                            <th>Montant épargné</th>
                            <th>Montant emprunté</th>
                            <th>Dette remboursée</th>
                            <th>Intérêt sur les dettes</th>
                            <th>Total obtenu</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($members as $member): ?>
                            <?php
                            $user = $member->user();
                            $savedAmount = $member->savedAmount($exercise);
                            $borrowedAmount = $member->borrowedAmount($exercise);
                            $refundedAmount = $member->refundedAmount($exercise);
                            $interest = $member->interest($exercise);

                            $labels[] = $user->name . " " . $user->first_name;
                            $data[] = $interest?$interest:0;
                            $colors[] = \app\managers\ColorManager::getColor();
                            ?>
                            <tr>
                                <td class="text-capitalize"><?= $user->name . " " . $user->first_name ?></td>
                                <td><?= $savedAmount?$savedAmount:0 ?> XAF</td>
                                <td><?= $borrowedAmount?$borrowedAmount:0 ?> XAF</td>
                                <td><?= $refundedAmount?$refundedAmount:0 ?> XAF</td>
                                <td class="blue-text"><?= $interest ?> XAF</td>
                                <td class="text-capitalize text-secondary"><?= !$exercise->active?$savedAmount+$interest." XAF":"###" ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
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

        <?php else: ?>

            <div class="col-12 white-block">
                <h1 class="text-center text-muted">Aucun exercice créé.</h1>
            </div>

        <?php endif; ?>

    </div>
</div>


<?php $this->beginBlock('script') ?>
<script>

    <?php

    $lLabels = [];
    $lData = [];

    if(isset($exercise))
    {
        $sessions = \app\models\Session::find()->where(['exercise_id' => $exercise->id])->orderBy('created_at',SORT_ASC)->all();
        $sum = 0;

        foreach ($sessions as $index => $session) {
            $lLabels[] = "Session ".($index+1);
            $lData[] = ($session->totalAmount());
        }
    }

    ?>

    //line
    var ctxL = document.getElementById("lineChart").getContext('2d');
    var myLineChart = new Chart(ctxL, {
        type: 'line',
        data: {
            labels: <?= json_encode($lLabels) ?>,
            datasets: [
                {
                    backgroundColor: [
                        'rgba(120, 137, 132, .3)',
                    ],
                    borderColor: [
                        'rgba(0, 10, 130, .7)',
                    ],
                    data: <?= json_encode($lData) ?>
                }
            ]
        },
        options: {
            responsive: true,
            legend: false
        }
    });


    var ctxP = document.getElementById("pieChart").getContext('2d');
    var myPieChart = new Chart(ctxP, {
        type: 'pie',
        data: {
            labels: <?= json_encode($labels) ?>,
            datasets: [{
                data:  <?= json_encode($data) ?>,
                backgroundColor: <?= json_encode($colors) ?>
            }]
        },
        options: {
            responsive: true,
            legend: {
                display : true
            }
        }
    });

</script>
<?php $this->endBlock() ?>
