<?php
$this->beginBlock('title') ?>
    Session
<?php $this->endBlock() ?>
<?php $this->beginBlock('style') ?>
    <style>
    </style>
<?php $this->endBlock() ?>

<div class="container mt-5 mb-5">
    <?php $savingAmount = \app\models\Saving::find()->where(['session_id' => $session->id])->sum('amount'); ?>
    <?php $refundAmount = \app\models\Refund::find()->where(['session_id' => $session->id])->sum('amount'); ?>
    <?php $borrowingAmount = \app\models\Borrowing::find()->where(['session_id' => $session->id])->sum('amount'); ?>
    <?php $transac = $savingAmount+$refundAmount-$borrowingAmount ?>

    <div class="row">
        <div class="col-12 white-block mb-3">
            <h3 class="text-center">Session du <?= (new DateTime($session->date))->format("d-m-Y") ?> <?= $session->active ? '(active)' : '' ?></h3>
            <h1 class="text-center text-secondary"><?= $transac ?> XAF</h1>
            <h3 class="text-center">transactés</h3>
        </div>

        <div class="col-12 white-block mb-3">
            <?php $savings = \app\models\Saving::findAll(['session_id' => $session->id]) ?>
            <h3 class="text-center">Epargnes : <span class="blue-text"><?= $savingAmount ? $savingAmount : 0 ?> XAF</span></h3>
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
                        <tr>
                            <th scope="row"><?= $index + 1 ?></th>
                            <td class="text-capitalize"><?= $memberUser->name . " " . $memberUser->first_name ?></td>
                            <td class="blue-text"><?= $saving->amount ?> XAF</td>
                            <td class="text-capitalize"><?= $administratorUser->name . " " . $administratorUser->first_name ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <h3 class="text-center text-muted">Aucune épargne à cette session</h3>
            <?php endif; ?>

        </div>

        <div class="col-12 white-block mb-3">
            <?php $refunds = \app\models\Refund::findAll(['session_id' => $session->id]) ?>
            <h3 class="text-center">Remboursement : <span class="blue-text"><?= $refundAmount ? $refundAmount : 0 ?> XAF</span></h3>

            <?php if (count($refunds)): ?>
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
                    <?php foreach ($refunds as $index => $refund): ?>
                        <?php $member = \app\models\Member::findOne((\app\models\Borrowing::findOne($refund->borrowing_id))->member_id);
                        $memberUser = \app\models\User::findOne($member->user_id);
                        $administrator = \app\models\Administrator::findOne($refund->administrator_id);
                        $administratorUser = \app\models\User::findOne($administrator->id);
                        ?>
                        <tr>
                            <th scope="row"><?= $index + 1 ?></th>
                            <td class="text-capitalize"><?= $memberUser->name . " " . $memberUser->first_name ?></td>
                            <td class="blue-text"><?= $refund->amount ?> XAF</td>
                            <td class="text-capitalize"><?= $administratorUser->name . " " . $administratorUser->first_name ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            <?php else: ?>
                <h3 class="text-center text-muted">Aucun remboursement à cette session</h3>
            <?php endif; ?>

        </div>


        <div class="col-12 white-block mb-3">
            <?php $borrowings = \app\models\Borrowing::findAll(['session_id' => $session->id]) ?>
            <h3 class="text-center">Emprunt : <span class="blue-text"><?= $borrowingAmount ? $borrowingAmount : 0 ?> XAF</span></h3>

            <?php if (count($borrowings)): ?>
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
                    <?php foreach ($borrowings as $index => $borrowing): ?>
                        <?php $member = \app\models\Member::findOne($borrowing->member_id);
                        $memberUser = \app\models\User::findOne($member->user_id);
                        $administrator = \app\models\Administrator::findOne($borrowing->administrator_id);
                        $administratorUser = \app\models\User::findOne($administrator->id);
                        ?>
                        <tr>
                            <th scope="row"><?= $index + 1 ?></th>
                            <td class="text-capitalize"><?= $memberUser->name . " " . $memberUser->first_name ?></td>
                            <td class="blue-text"><?= $borrowing->amount ?> XAF</td>
                            <td class="text-capitalize"><?= $administratorUser->name . " " . $administratorUser->first_name ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            <?php else: ?>
                <h3 class="text-center text-muted">Aucun emprunt à cette session</h3>
            <?php endif; ?>

        </div>
    </div>

</div>
