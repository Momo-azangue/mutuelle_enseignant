<?php use yii\widgets\LinkPager;

$this->beginBlock('title') ?>
Epargnes
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
                <?php $savingAmount = \app\models\Saving::find()->where(['session_id' => $activeSession->id])->sum('amount'); ?>
                <div class="col-12 white-block text-center mb-5">
                    <h3>Session active</h3>
                    <h1 class="blue-text"><?= $savingAmount ? $savingAmount : 0 ?> XAF</h1>
                    <h3>épargnés</h3>
                </div>
                <?php if ($activeSession->state == "SAVING"): ?>
                    <button class="btn <?= $model->hasErrors()?'in':''?> btn-primary btn-add" data-toggle="modal" data-target="#modalLRFormDemo"><i
                                class="fas fa-plus"></i></button>
                    <div class="modal fade" id="modalLRFormDemo" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <?php $members = \app\models\Member::find()->where(['active' => true])->all() ?>


                                <?php if (count($members)): ?>

                                    <?php
                                    $items = [];
                                    foreach ($members as $member) {
                                        $user = \app\models\User::findOne($member->user_id);
                                        $items[$member->id] = $user->name . " " . $user->first_name;
                                    }
                                    ?>

                                    <?php $form = \yii\widgets\ActiveForm::begin([
                                        'errorCssClass' => 'text-secondary',
                                        'method' => 'post',
                                        'action' => '@administrator.new_saving',
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
                                    <div class="modal-body">
                                        <h3 class="text-muted text-center">Aucun membre inscrit</h3>
                                        <div class="text-center my-2">
                                            <a href="<?= Yii::getAlias("@administrator.new_member") ?>"
                                               class="btn btn-primary">Inscrire un membre</a>
                                        </div>
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
                <?php $savings = \app\models\Saving::findAll(['session_id' => $session->id]) ?>

                <div class="col-12 white-block mb-2">
                    <?php $savingAmount = \app\models\Saving::find()->where(['session_id' => $session->id])->sum('amount'); ?>
                    <h5 class="mb-4">Session du <span
                                class="text-secondary"><?= (new DateTime($session->date))->format("d-m-Y") ?> <?= $session->active ? '(active)' : '' ?></span>
                        : <span class="blue-text"><?= $savingAmount ? $savingAmount : 0 ?> XAF</span></h5>

                    <?php if (count($savings)): ?>
                        <table class="table table-hover">
                            <thead class="blue-grey lighten-4">
                            <tr>
                                <th>#</th>
                                <th>Membre</th>
                                <th>Montant</th>
                                <th>Administrateur</th>
                            </tr>

                            </thead>
                            <tbody>
                            <?php foreach ($savings as $index => $saving): ?>
                                <?php $member = \app\models\Member::findOne($saving->member_id);
                                $memberUser = \app\models\User::findOne($member->user_id);
                                $administrator = \app\models\Administrator::findOne($saving->administrator_id);
                                $administratorUser = \app\models\User::findOne($administrator->id);
                                ?>
                                <?php
                                    if ($session->active && $session->state == "SAVING"):
                                ?>
                                <tr data-target="#modalS<?= $saving->id?>" data-toggle="modal">
                                    <th scope="row"><?= $index + 1 ?></th>
                                    <td class="text-capitalize"><?= $memberUser->name . " " . $memberUser->first_name ?></td>
                                    <td class="blue-text"><?= $saving->amount ?> XAF</td>
                                    <td class="text-capitalize"><?= $administratorUser->name . " " . $administratorUser->first_name ?></td>
                                </tr>

                                        <div class="modal fade" id="modalS<?= $saving->id ?>" tabindex="-1" role="dialog"
                                             aria-labelledby="myModalLabel"
                                             aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <p class="p-1 text-center">
                                                            Êtes-vous sûr(e) de vouloir supprimer cette épargne?
                                                        </p>
                                                        <div class="text-center">
                                                            <button data-dismiss="modal" class="btn btn-danger">non</button>
                                                            <a href="<?= Yii::getAlias("@administrator.delete_saving")."?q=".$saving->id?>" class="btn btn-primary">oui</a>
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
                                            <td class="blue-text"><?= $saving->amount ?> XAF</td>
                                            <td class="text-capitalize"><?= $administratorUser->name . " " . $administratorUser->first_name ?></td>
                                        </tr>
                            <?php
                                    endif;
                            ?>
                            <?php endforeach; ?>
                            </tbody>
                        </table>

                    <?php else: ?>
                        <h3 class="text-center text-muted">Aucune épargne à cette session</h3>
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
