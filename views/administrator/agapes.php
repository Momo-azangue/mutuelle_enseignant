<?php use yii\widgets\LinkPager;

$this->beginBlock('title') ?>
Epargnes
<?php $this->endBlock() ?>
<?php $this->beginBlock('style') ?>
<style>
</style>
<?php $this->endBlock() ?>

<div class="container mt-5 mb-5">

    <div>

        <?php if(count($sessions)): ?>
        <?php $activeSession = \app\models\Session::findOne(['active' => true]); ?>

        <?php if($activeSession): ?>

        <?php $agapeAmount = \app\models\Agape::find()->where(['session_id' => $activeSession->id])->sum('amount') ?>
        <div class="col-12 white-block text-center mb-5">
            <h3>agape valeur de la session </h3>
            <h1 class="blue-text"><?= $agapeAmount ? $agapeAmount: 0 ?> XAF</h1>


        </div>
    </div>
</div>

<div class="container mt-5 mb-5 ">

    <?php endif; ?>
    <?php endif; ?>
</div>

<div class="col-10">
    <div class="col-12 mb-3">
        <h3 class="text-muted text-center">Agape</h3>
    </div>
    <div class="col-12">
        <div class="row justify-content-center">
            <?php
            $formAgape = \yii\widgets\ActiveForm::begin([
                'method' => 'post',
                'errorCssClass' => 'text-secondary',
                'action' => '@administrator.nouvelle_agape',
                'options' => ['class' => 'col-12 col-md-8 white-block']
            ])
            ?>

            <?= $formAgape->field($model,'amount')->input("number",['required'=> 'required'])->label('entrez le montant de l\'agape') ?>


            <div class="form-group text-right">
                <button class="btn btn-primary" type="submit">Enregistrer</button>
            </div>
            <?php
            \yii\widgets\ActiveForm::end();
            ?>


        </div>
    </div>
</div>