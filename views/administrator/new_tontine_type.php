<?php $this->beginBlock('title') ?>
Type de Tontine
<?php $this->endBlock()?>
<?php $this->beginBlock('style')?>
<?php $this->endBlock()?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <?php $form = \yii\widgets\ActiveForm::begin([
            'method' => 'post',
            'action' => '@administrator.add_tontine_type',
            'errorCssClass' => 'text-secondary',
            'options' => ['class' => 'col-md-8 col-12 white-block']
        ])
        ?>
        <?= $form->field($model,'id')->hiddenInput(['value'=>0])->label(false) ?>
        <?= $form->field($model,'title')->label('Titre de la tontine')->input('text',['required'=>'required']) ?>
        <?= $form->field($model,'amount')->label("Montant")->input('number',['min'=> 0,'required'=>'required'])?>
        <div class="form-group text-right">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
        <?php \yii\widgets\ActiveForm::end()?>
    </div>

</div>