<?php $this->beginBlock('title') ?>
Nouvel administrateur
<?php $this->endBlock()?>
<?php $this->beginBlock('style') ?>
<style>

    .form-block {
        padding: 20px;
        background-color: white;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.49);
    }
</style>
<?php $this->endBlock()?>


<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <h3 class="col-12 text-center text-muted">
            Nouvel administrateur
        </h3>
        <?php $form = \yii\widgets\ActiveForm::begin([
            'method' => 'post',
            'action' => '@administrator.add_administrator',
            'scrollToError' => true,
            'errorCssClass' =>'text-secondary',
            'options' => ['enctype' => 'multipart/form-data','class' => 'col-md-8 col-12 form-block'],
        ]); ?>

        <?= $form->field($model,'username')->label('Nom d\'utilisateur') ?>
        <?= $form->field($model,'first_name')->label('Prénom') ?>
        <?= $form->field($model,'name')->label('Nom') ?>
        <?= $form->field($model,'tel')->input('tel')->label('Téléphone') ?>
        <?= $form->field($model,'email')->input('email')->label('Email') ?>
        <?= $form->field($model,'address')->input('address')->label('Adresse') ?>
        <?= $form->field($model,'avatar')->fileInput();?>
        <?= $form->field($model,'password')->input('password')->label('Mot de passe') ?>
        <div class="form-group text-right">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
        <?php \yii\widgets\ActiveForm::end()?>

    </div>

</div>