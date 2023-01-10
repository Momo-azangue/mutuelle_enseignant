<?php $this->beginBlock('title') ?>
Accueil
<?php $this->endBlock() ?>
<?php $this->beginBlock('style') ?>
<style>
    #saving-amount-title {
        font-size: 5rem;
        color: white;
    }
    .img-bravo {
        width: 100px;
        height: 100px;
        border-radius: 100px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.51);
    }
    .media {
        border-bottom: 1px solid #ededed;
    }
    #social-crown {
        font-size: 5rem;
    }
</style>
<?php $this->endBlock() ?>

<div class="container mt-5 mb-5">
    <div class="row mb-2">
        <div class="col-12 white-block text-center blue-gradient ">
            <?php if ($session): ?>

                <?php
                $exercise = \app\models\Exercise::findOne(['active' => true]);

                ?>

                <h3 class="text-white">Trésorerie</h3>
                <h1 id="saving-amount-title">
                    <?= $exercise->exerciseAmount() ?> XAF
                </h1>
                <h3>
                <?php
                if ($session->state == "SAVING"):
                    ?>
                <a href="<?= Yii::getAlias("@administrator.savings") ?>" class="btn btn-white" style="border-radius: 50px">Phase des épargnes</a>
                <?php
                elseif ($session->state == "REFUND"):
                    ?>
                    <a href="<?= Yii::getAlias("@administrator.refunds") ?>" class="btn btn-white" style="border-radius: 50px">Phase des remboursements</a>
                <?php
                elseif ($session->state == "BORROWING"):
                    ?>
                    <a href="<?= Yii::getAlias("@administrator.borrowings") ?>" class="btn btn-white" style="border-radius: 50px">Phase des emprunts</a>
                <?php
                endif;
                ?>

                </h3>
                <?php if ($session->state == "SAVING"):
                    ?>
                    <div class="mt-3 row align-items-center">
                        <h4 class="col-3 text-left text-white">
                            Session N° <?= $session->number() ?>
                        </h4>
                        <div class="col-9 text text-right">
                            <button class="btn btn-primary" data-target="#modal-passer-remboursement" data-toggle="modal">
                                Passer aux remboursements
                            </button>
                        </div>
                    </div>

                    <div class="modal fade" id="modal-passer-remboursement" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <p>Êtes-vous sûr(e) de vouloir passer aux remboursements?</p>
                                    <div class="mt-3">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Non
                                        </button>
                                        <a href="<?= Yii::getAlias("@administrator.go_to_refunds") . "?q=" . $session->id ?>"
                                           class="btn btn-primary">Oui</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                elseif ($session->state == "REFUND"):
                    ?>
                    <div class="mt-3 row align-items-center">
                        <h4 class="col-3 text-white text-left">
                            Session N° <?= $session->number() ?>
                        </h4>
                        <div class="col-9 text-right">
                            <button class="btn btn-secondary" data-toggle="modal" data-target="#modal-rentrer-epargne">
                                Rentrer aux epargnes
                            </button>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modal-passer-emprunt">Passer
                                aux emprunts
                            </button>
                        </div>
                    </div>
                    <div class="modal fade" id="modal-rentrer-epargne" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <p>Êtes-vous sûr(e) de vouloir retourner aux epargnes? Tous les remboursements enregistrés seront perdus.</p>
                                    <div class="mt-3">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Non
                                        </button>
                                        <a href="<?= Yii::getAlias("@administrator.back_to_savings") . "?q=" . $session->id ?>"
                                           class="btn btn-primary">Oui</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modal-passer-emprunt" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <p>Êtes-vous sûr(e) de vouloir passer aux emprunts?</p>
                                    <div class="mt-3">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Non
                                        </button>
                                        <a href="<?= Yii::getAlias("@administrator.go_to_borrowings") . "?q=" . $session->id ?>"
                                           class="btn btn-primary">Oui</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                elseif ($session->state == "BORROWING"):
                    ?>
                    <div class="mt-3 row align-items-center">
                        <h4 class="col-3 text-left text-white">
                            Session N° <?= $session->number() ?>
                        </h4>
                        <div class="col-9 text-right">

                            <button class="btn btn-secondary" data-toggle="modal"
                                    data-target="#modal-rentrer-remboursement">Rentrer aux remboursements
                            </button>
                            <?php if (\app\managers\FinanceManager::numberOfSession() < 12): ?>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modal-cloturer">Cloturer
                                    la session
                                </button>
                            <?php else: ?>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modal-cloturer">Cloturer
                                    l'exercice
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="modal fade" id="modal-rentrer-remboursement" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <p>Êtes-vous sûr(e) de vouloir retourner aux remboursements? Tous les emprunts enregistrés seront perdus.</p>
                                    <div class="mt-3">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Non
                                        </button>
                                        <a href="<?= Yii::getAlias("@administrator.back_to_refunds") . "?q=" . $session->id ?>"
                                           class="btn btn-primary">Oui</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if (\app\managers\FinanceManager::numberOfSession() < 12): ?>
                    <div class="modal fade" id="modal-cloturer" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <p>Êtes-vous sûr(e) de vouloir cloturer la session? Vous ne pourrez plus faire aucun enregistrerment.</p>
                                    <div class="mt-3">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Non
                                        </button>
                                        <a href="<?= Yii::getAlias("@administrator.cloture_session") . "?q=" . $session->id ?>"
                                           class="btn btn-primary">Oui</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="modal fade" id="modal-cloturer" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="text-center mb-2">
                                        <img src="/img/bravo.jpg" alt="bravo" class="img-bravo">
                                    </div>
                                    <p class="text-center text-secondary">Félicitations !</p>
                                    <p>Vous êtes au terme de l'exercice. Voulez-vous passer au décaissement?</p>
                                    <div class="mt-3">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Non
                                        </button>
                                        <a href="<?= Yii::getAlias("@administrator.cloture_exercise") . "?q=" . $session->id ?>"
                                           class="btn btn-primary">Oui</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php endif; ?>
            <?php else: ?>

                <?php
                $exercise = \app\models\Exercise::findOne(['active' => true]);

                ?>

                <h3 class="text-white">Trésorerie</h3>
                <h1 id="saving-amount-title">
                    <?= $exercise?$exercise->exerciseAmount():0 ?> XAF
                </h1>

                <h3 class="mb-3 text-white">Aucune session en activité</h3>
                <button class="btn btn-primary <?= $model->hasErrors() ? 'in' : '' ?>" data-toggle="modal"
                        data-target="#modalLRFormDemo">
                    <?php if($exercise): ?>
                        Commencer une nouvelle session
                    <?php else: ?>
                        Commencer un nouvel exercice
                    <?php endif; ?>
                </button>

                <div class="modal fade" id="modalLRFormDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <?php $form = \yii\widgets\ActiveForm::begin([
                                'errorCssClass' => 'text-secondary',
                                'method' => 'post',
                                'action' => '@administrator.new_session',
                                'options' => ['class' => 'modal-body']
                            ]) ?>

                            <?php if(!$exercise): ?>
                                <?= $form->field($model, 'year')->input('number', ['required' => 'required'])->label("Année de l'exercice") ?>
                            <?php endif; ?>

                            <?= $form->field($model, 'date')->input('date', ['required' => 'required'])->label("Date de la rencontre de la première session") ?>

                            <div class="form-group text-right">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-primary">
                                    <?php if($exercise): ?>
                                        Créer la session
                                    <?php else: ?>
                                        Créer l'exercice
                                    <?php endif; ?>
                                </button>
                            </div>
                            <?php \yii\widgets\ActiveForm::end(); ?>

                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <?php

        ?>

        <?php

        ?>
        <div class="col-md-8  pr-4">
            <div class="row">
                <div class="col-12 white-block">
                    <h3 class="text-center text-muted">Fond social</h3>
                    <h1 id="social-crown" class="blue-text text-center"><?= ($t=\app\managers\FinanceManager::socialCrown())? ($t>0?$t:0) :0 ?> XAF</h1>

                    <h3 class="text-center text-muted">Evènements de la mutuelle</h3>
                    <?php
                    $helps = \app\models\Help::findAll(['state' => true]);
                    ?>
                    <?php
                    if (count($helps)):
                    ?>
                        <?php
                    foreach ($helps as $help):
                        $member = $help->member();
                    $user = $member->user();
                    $helpType = $help->helpType();
                    ?>
                        <div class="media">
                            <img class="d-flex mr-3" width="60" height="60" src="<?= \app\managers\FileManager::loadAvatar($user)?>" alt="Generic placeholder image">
                            <div class="media-body">
                                <h5 class="mt-0 font-weight-bold"><?= $helpType->title ?></h5>
                                <span class="blue-text"><b><?= $user->name.' '.$user->first_name?></b></span>
                                <br>
                                <?= $help->comments ?>
                                <br>
                                <span style="font-size: 1.5rem" class="text-secondary"><?= ($t=$help->contributedAmount())?$t:0?> / <?= $help->amount?>  XAF</span>
                                <div class="text-right">
                                    <a href="<?= Yii::getAlias("@administrator.help_details")."?q=".$help->id?>" class="btn btn-primary p-2">Détails</a>
                                </div>
                            </div>
                        </div>

                        <?php
                    endforeach;
                        ?>

                    <?php
                    else:
                    ?>
                    <p class="text-center text-primary">Aucune aide active</p>
                    <?php
                    endif;
                    ?>
                    <p class="text-center"><a href="<?= Yii::getAlias("@administrator.new_help") ?>" class="btn btn-primary">Créer une nouvelle aide</a></p>


                </div>
            </div>
        </div>
        <div class="col-md-4">
            <?php
            if ($session):
            ?>
            <div class="white-block mb-3">
                <h5 class="text-muted text-center">Détail sur la session</h5>
                <p>Epargne : <span class="blue-text"><?= ($t=$session->savedAmount())?$t:0 ?> XAF</span></p>
                <p>Remboursement : <span class="blue-text"><?= ($t=$session->refundedAmount())?$t:0 ?> XAF</span></p>
                <p>Emprunt : <span class="text-secondary"><?= ($t=$session->borrowedAmount())?$t:0  ?> XAF</span></p>

                <h5 class="text-muted text-center mt-3">Phase de la session</h5>
                <h5 class="text-center blue-text">
                    <?php
                    if ($session->state == "SAVING"):
                        ?>
                        <a href="<?= Yii::getAlias("@administrator.savings") ?>">Epargne</a>
                    <?php
                    elseif ($session->state == "REFUND"):
                        ?>
                        <a href="<?= Yii::getAlias("@administrator.refunds") ?>">Remboursement</a>
                    <?php
                    elseif ($session->state == "BORROWING"):
                        ?>
                        <a href="<?= Yii::getAlias("@administrator.borrowings") ?>">Emprunt</a>
                    <?php
                    endif;
                    ?>
                </h5>
            </div>

                <?php
            $borrowings = $exercise->borrowings();
                ?>
                <?php
                if (count($borrowings)):
                ?>
            <div class="white-block">
                <h5 class="text-muted text-center mt-3">Emprunts actifs</h5>
                <?php
                foreach ($borrowings as $borrowing):
                    $member = $borrowing->member();
                    $user = $member->user();

                    $intendedAmount = $borrowing->intendedAmount();
                    $refundedAmount = $borrowing->refundedAmount();
                    $rest = $intendedAmount-$refundedAmount;

                ?>
                    <div class="media">
                        <img class="d-flex mr-3" width="50" height="50" src="<?= \app\managers\FileManager::loadAvatar($user) ?>" alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0 font-weight-bold"><?= $user->name.' '.$user->first_name ?></h5>
                            Date : <span class="blue-text"><?= $borrowing->created_at ?> </span>
                            <br>
                            Dette : <span class="blue-text"><?= $intendedAmount ?> XAF</span>
                            <br>
                            Total remboursé : <span class="blue-text"><?= $borrowing->refundedAmount() ?> XAF</span>
                            <br>
                            Reste : <span class="text-secondary"><?= $rest ?> XAF</span>
                            <br>


                        </div>
                    </div>
                <?php
                endforeach;
                ?>
            </div>
                    <?php
                endif;
                    ?>

            <?php
            endif;
            ?>
        </div>
    </div>

</div>