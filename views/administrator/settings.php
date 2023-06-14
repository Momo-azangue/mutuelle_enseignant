<?php $this->beginBlock('title') ?>
    Configuration
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

    <div class="row">
        <div class="col-12 mb-3">
            <h3 class="text-muted text-center">Configurations</h3>
        </div>
        <div class="col-12">
            <div class="row justify-content-center">
                <?php
                $form = \yii\widgets\ActiveForm::begin([
                    'method' => 'post',
                    'errorCssClass' => 'text-secondary',
                    'action' => '@administrator.apply_settings',
                    'options' => ['class' => 'col-12 col-md-8 white-block']
                ])
                ?>

                <?= $form->field($model,'interest')->input("number",['required'=> 'required'])->label('Intérêt par mois sur un emprunt en %') ?>


                <?= $form->field($model,'social_crown')->input("number",['required'=> 'required'])->label('Montant du fond social à payer par membre en FCFA') ?>

                <?= $form->field($model,'inscription')->input("number",['required'=> 'required'])->label('Montant de l\'inscription à payer par membre en FCFA') ?>

                <div class="form-group text-right">
                    <button class="btn btn-primary" type="submit">Enregistrer</button>
                </div>
                <?php
                \yii\widgets\ActiveForm::end();
                ?>


            </div>
        </div>
</div>
    <div class="container mt-5 mb-5 ">
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
                        'action' => '@administrator.apply_agape',
                        'options' => ['class' => 'col-12 col-md-8 white-block']
                    ])
                    ?>

                    <?= $formAgape->field($agapeForm,'agape')->input("number",['required'=> 'required'])->label('entrez le montant de l\'agape') ?>


                    <div class="form-group text-right">
                        <button class="btn btn-primary" type="submit">Enregistrer</button>
                    </div>
                    <?php
                    \yii\widgets\ActiveForm::end();
                    ?>


                </div>
            </div>
        </div>
