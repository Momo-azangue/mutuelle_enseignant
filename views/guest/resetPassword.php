<?php

/**
 * modified by vs code
 * User: William Momo
 * Date: 06/01/2023
 * Time: 11:21
 */

/** @var yii\web\View $this  */
/** @var yii\bosstrap\ActiveForm $form */
/** @var \models\ResetPasswordForm $model*/


use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?> 
<div class="site-reset-password">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please choose your new password:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?> 
        </div>
    </div>
</div>
