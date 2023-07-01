<?php
use yii\widgets\LinkPager;
use yii\helpers\Html;
use app\models\Session;

/* @var $this yii\web\View */
/* @var $model app\models\Agape */
/* @var $sessions app\models\Session[] */
/* @var $exercise_id int */

$this->beginBlock('title') ?>
Agape
<?php $this->endBlock() ?>

<?php $this->beginBlock('style') ?>
<style>
</style>
<?php $this->endBlock() ?>

<div class="container mt-5 mb-5">
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
                    'action' => '@administrator.agape',
                    'options' => ['class' => 'col-12 col-md-8 white-block']
                ])
                ?>

                <?= $formAgape->field($agapeForm,'amount')->input("number",['required'=> 'required'])->label('Entrez le montant de l\'agape') ?>
                <?= $formAgape->field($agapeForm, 'session_id')->dropDownList(
                    Session::find()->where(['exercise_id' => $exercise_id])->select(['date', 'id'])->indexBy('id')->column(),
                    ['prompt' => 'Choisir une session']
                )->label('Session ') ?>

                <div class="form-group text-right">
                    <!-- <?= Html::a('Modifier Agape', ['administrator/update-agape', 'id' => $agapeForm->agape_id], ['class' => 'btn btn-primary']) ?>-->

                    <?= Html::submitButton('Enregister', ['class' => 'btn btn-primary']) ?>
                </div>
                <?php \yii\widgets\ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
