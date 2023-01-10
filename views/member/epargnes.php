<?php use yii\widgets\LinkPager;

$this->beginBlock('title') ?>
Mes épargnes
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

            <?php foreach ($exercises as $exercise): ?>
                <div class="col-12 white-block mb-2">

                    <?php
                    $savings = $member->exerciseSavings($exercise);
                    ?>
                    <h1 class="text-muted text-center">Exercice de l'année <span class="blue-text"><?= $exercise->year ?></span></h1>
                    <h3 class="text-secondary text-center"><?= $exercise->active?"En cours":"Terminé" ?></h3>

                    <?php if (count($savings)):?>

                        <table class="table table-hover">
                            <thead class="blue-grey lighten-4">
                                <tr>
                                    <th>#</th>
                                    <th>Montant</th>
                                    <th>Administrateur</th>
                                    <th>Session</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php foreach ($savings as $index => $saving): ?>
                                <?php
                                $amount = $saving->amount;
                                $administrator = $saving->administrator()->user();
                                $session = $saving->session();
                                ?>
                                    <tr>
                                        <th scope="row"><?= $index + 1 ?></th>
                                        <td class="blue-text"><?= $amount ? $amount : 0 ?> XAF</td>
                                        <td class="text-capitalize"><?= $administrator->name." ". $administrator->first_name ?></td>
                                        <td><?= $session->date() ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else:?>
                        <h3 class="text-center text-muted">Aucune épargne pour cet exercice</h3>
                    <?php endif; ?>

                </div>
            <?php endforeach; ?>

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

        <?php else:?>
            <h3 class="text-center text-muted">Aucun exercice enregistré.</h3>
        <?php endif;?>

        

    </div>
</div>