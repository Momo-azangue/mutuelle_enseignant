<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Session;

/* @var $this yii\web\View */
/* @var $model app\models\Agape3 */
/* @var $sessions app\models\Session[] */

$this->title = 'Create Agape3';
$this->params['breadcrumbs'][] = ['label' => 'Agape3s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agape3-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'session_id')->dropDownList(
        Session::find()->select(['date', 'id'])->indexBy('id')->column(),
        ['prompt' => 'Select Session']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
