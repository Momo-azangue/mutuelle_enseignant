<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Session;

/* @var $this yii\web\View */
/* @var $agapeForm app\models\Agape */
/* @var $sessions app\models\Session[] */

$this->title = 'Create Agape3';
$this->params['breadcrumbs'][] = ['label' => 'Agape3s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agape3-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $formAgape = \yii\widgets\ActiveForm::begin([
        'method' => 'post',
        'errorCssClass' => 'text-secondary',
        'action' => '@administrator.agape',
        'options' => ['class' => 'col-12 col-md-8 white-block']
    ]) ?>

    <?= $formAgape->field($agapeForm, 'amount')->textInput() ?>

    <?= $formAgape->field($agapeForm, 'session_id')->dropDownList(
        Session::find()->select(['date', 'id'])->indexBy('id')->column(),
        ['prompt' => 'Select Session']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Enregistrer', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
