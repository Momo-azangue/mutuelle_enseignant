<?php
?>
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
                        'action' => '@administrator.agapess',
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
