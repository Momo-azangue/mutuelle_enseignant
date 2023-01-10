<?php use yii\widgets\LinkPager;

$this->beginBlock('title') ?>
Remboursements
<?php $this->endBlock() ?>
<?php $this->beginBlock('style') ?>
<style>
</style>
<?php $this->endBlock() ?>


<div class="container mt-5 mb-5">
    <div class="row">
        <?php if (count($sessions)): ?>
            <?php $activeSession = \app\models\Session::findOne(['active' => true]); ?>

            <?php if ($activeSession): ?>
                <?php $refundAmount = \app\models\Refund::find()->where(['session_id' => $activeSession->id])->sum('amount'); ?>
                <div class="col-12 white-block text-center mb-5">
                    <h3>Session active</h3>
                    <h1 class="blue-text"><?= $refundAmount ? $refundAmount : 0 ?> XAF</h1>
                    <h3>remboursés</h3>
                </div>
                <?php if ($activeSession->state == "REFUND"): ?>
                    <button class="btn <?= $model->hasErrors()?'in':''?> btn-primary btn-add" data-toggle="modal" data-target="#modalLRFormDemo"><i
                            class="fas fa-plus"></i></button>
                    <div class="modal  fade" id="modalLRFormDemo" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <?php

                                $tmp = \app\managers\FinanceManager::MembersAndUsersWithBorrowings();
                                $users = $tmp['users'];
                                $members = $tmp['members'];
                                ?>


                                <?php if (count($members)): ?>

                                    <?php
                                    $items = [];
                                    foreach ($members as $index => $member) {
                                        $user = $users[$index];
                                        $items[$member->id] = $user->name . " " . $user->first_name;
                                    }
                                    ?>

                                    <?php $form = \yii\widgets\ActiveForm::begin([
                                        'errorCssClass' => 'text-secondary',
                                        'method' => 'post',
                                        'action' => '@administrator.new_refund',
                                        'options' => ['class' => 'modal-body']
                                    ]) ?>
                                    <?= $form->field($model, 'member_id')->dropDownList($items)->label("Membre") ?>

                                    <?= $form->field($model, "amount")->label("Montant")->input("number", ['required' => 'required']) ?>

                                    <?= $form->field($model, 'session_id')->hiddenInput(['value' => $activeSession->id])->label(false) ?>
                                    <div class="form-group text-right">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler
                                        </button>
                                        <button type="submit" class="btn btn-primary">Ajouter</button>
                                    </div>
                                    <?php \yii\widgets\ActiveForm::end(); ?>


                                <?php else: ?>
                                    <div class="modal-body p-5">
                                        <h3 class="text-muted text-center">Aucun emprunt non remboursé</h3>
                                    </div>

                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            <?php else: ?>
                <div class="col-12 white-block mb-5">
                    <h3 class="text-muted text-center">Aucune session active</h3>
                </div>
            <?php endif; ?>

            <?php foreach ($sessions as $session): ?>
                <?php $refunds = \app\models\Refund::findAll(['session_id' => $session->id]) ?>

                <div class="col-12 white-block mb-2">
                    <?php $refundAmount = \app\models\Refund::find()->where(['session_id' => $session->id])->sum('amount'); ?>
                    <h5 class="mb-4">Session du <span
                            class="text-secondary"><?= (new DateTime($session->date))->format("d-m-Y") ?> <?= $session->active ? '(active)' : '' ?></span>
                        : <span class="blue-text"><?= $refundAmount ? $refundAmount : 0 ?> XAF</span></h5>

                    <?php if (count($refunds)): ?>
                        <table class="table table-hover">
                            <thead class="blue-grey lighten-4">
                            <tr>
                                <th>#</th>
                                <th>Membre</th>
                                <th>Montant</th>
                                <th>Reste à payer</th>
                                <th>Administrateur</th>
                            </tr>

                            </thead>
                            <tbody>
                            <?php foreach ($refunds as $index => $refund): ?>
                                <?php $member = \app\models\Member::findOne((\app\models\Borrowing::findOne($refund->borrowing_id))->member_id);
                                $memberUser = \app\models\User::findOne($member->user_id);
                                $administrator = \app\models\Administrator::findOne($refund->administrator_id);
                                $administratorUser = \app\models\User::findOne($administrator->id);
                                $borrowing = $refund->borrowing();
                                ?>
                            <?php
                            if ($session->active && $session->state == "REFUNDS"):
                                $r = $borrowing->intendedAmount()-$borrowing->refundedAmount();
                            ?>
                                <tr data-target="#modalS<?= $refund->id?>" data-toggle="modal">
                                    <th scope="row"><?= $index + 1 ?></th>
                                    <td class="text-capitalize"><?= $memberUser->name . " " . $memberUser->first_name ?></td>
                                    <td class="blue-text"><?= $refund->amount ?> XAF</td>
                                    <th><?= ($r > 0)? $r:0  ?> XAF</th>
                                    <td class="text-capitalize"><?= $administratorUser->name . " " . $administratorUser->first_name ?></td>
                                </tr>

                                <div class="modal fade" id="modalS<?= $refund->id ?>" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <p class="p-1 text-center">
                                                    Êtes-vous sûr(e) de vouloir supprimer ce remboursement ?
                                                </p>
                                                <div class="text-center">
                                                    <button data-dismiss="modal" class="btn btn-danger">non</button>
                                                    <a href="<?= Yii::getAlias("@administrator.delete_refund")."?q=".$refund->id?>" class="btn btn-primary">oui</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            <?php
                                    else:
                            ?>
                                        <tr>
                                            <th scope="row"><?= $index + 1 ?></th>
                                            <td class="text-capitalize"><?= $memberUser->name . " " . $memberUser->first_name ?></td>
                                            <td class="blue-text"><?= $refund->amount ?> XAF</td>
                                            <th><?= $borrowing->intendedAmount()-$borrowing->refundedAmount() ?> XAF</th>
                                            <td class="text-capitalize"><?= $administratorUser->name . " " . $administratorUser->first_name ?></td>
                                        </tr>
                            <?php
                                    endif;
                            ?>

                            <?php endforeach; ?>
                            </tbody>
                        </table>

                    <?php else: ?>
                        <h3 class="text-center text-muted">Aucun remboursement à cette session</h3>
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

        <?php else: ?>
            <div class="col-12 white-block">
                <h1 class="text-muted text-center">Aucune session créée</h1>
            </div>

        <?php endif; ?>
    </div>
</div>
