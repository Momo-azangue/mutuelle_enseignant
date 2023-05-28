
<?php $this->beginBlock('title') ?>
    Agape
<?php $this->endBlock() ?>
<?php $this->beginBlock('style') ?>

<?php $this->endBlock() ?>
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

                <?= $form->field($model, 'agape')->input("number",['required'=>'required'])->label('Montant de L\'agapè Mensuel en FCFA') ?>
                <div class="form-group text-right">
                    <button class="btn btn-primary" type="submit">Enregistrer l'Agapè</button>
                </div>
                <?php
                \yii\widgets\ActiveForm::end();
                ?>
            </div>
        </div>
    </div>