<?php
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
                <img src="<?= \app\managers\FileManager::loadAvatar($user,"256")?>" alt="">
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
                    Adresse
                </div>
                <div class="col-7">
                    <?= $user->address ?>
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
                <div class="col-5">
                    Date d'inscription 
                </div>
                <div class="col-7">
                    <?= $user->created_at ?>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 text-right">
                    <?php
                    if ($member->active):
                    ?>
                        <a href="<?= Yii::getAlias("@administrator.disable_member")."?q=".$member->id ?>" class="btn btn-danger p-2">Désactiver le membre</a>
                    <?php
                    else:
                    ?>

                        <a href="<?= Yii::getAlias("@administrator.enable_member")."?q=".$member->id ?>" class="btn btn-primary p-2">Activer le membre</a>
                    <?php
                    endif;
                    ?>
                </div>
                <div class="col-12 text-right">
                
                <button class="btn btn-danger m-0 p-2" data-toggle="modal" data-target="#modal">supprimer</button>
                    <div class="modal  fade" id="modal" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">

                                <p class="text-center">Êtes-vous sûr(e) de vouloir supprimer ce membre?
                                </p>

                                <div class="form-group text-center">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Non</button>
                                    <a href="<?=Yii::getAlias("@administrator.delete_member")."?q=".$member->id?>" class="btn btn-primary">Oui</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                

    
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12 white-block mb-2">
            <div class="row">
                <h5 class="col">
                    <a href="<?= Yii::getAlias("@administrator.member")."?q=".$member->id ?>">Général</a>
                </h5>
                <h5 class="col">
                    <a class="black-link" href="<?= Yii::getAlias("@administrator.saving_member")."?q=".$member->id ?>">Epargnes</a>
                </h5>
                <h5 class="col">
                    <a class="black-link" href="<?= Yii::getAlias("@administrator.borrowing_member")."?q=".$member->id ?>">Emprunts</a>
                </h5>
                <h5 class="col">
                    <a class="black-link" href="<?= Yii::getAlias("@administrator.contribution_member")."?q=".$member->id ?>">Contributions</a>
                </h5>
            </div>
        </div>
        <div class="col-12 white-block">
            <?php
            $exercises = \app\models\Exercise::find()->orderBy("created_at",SORT_ASC)->all();
            ?>

            <?php if ( count($exercises)):?>

                <table class="table table-hover">
                    <thead class="blue-grey lighten-4">
                    <tr>
                        <th>Année</th>
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
                            <th scope="row"><?= $exercise->year ?></th>
                            <td><?= $savedAmount?$savedAmount:0 ?> XAF</td>
                            <td><?= $borrowingAmount?$borrowingAmount:0 ?> XAF</td>
                            <td><?= $refundedAmount?$refundedAmount:0 ?> XAF</td>
                            <td><?= $interest?$interest:0 ?> XAF</td>
                            <td class="blue-text"><?= $exercise->active?"###": ($total .' XAF') ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            <?php else:?>
                <h3 class="text-center text-muted">Aucun exercice enregistré.</h3>
            <?php endif;?>
        </div>
    </div>
</div>
