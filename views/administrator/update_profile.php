<?php $this->beginBlock('title') ?>
Profil
<?php $this->endBlock()?>
<?php $this->beginBlock('style')?>
<style>

</style>
<?php $this->endBlock()?>



<div class="container mt-5 mb-5">
    <div class="row justify-content-center">

        <?php $form1 = \yii\widgets\ActiveForm::begin(['method' => 'post',
            'action' => '@administrator.update_social_information',
            'options' => ['enctype' => 'multipart/form-data','class' => 'col-md-5 mb-2 white-block mr-md-2'],
            'errorCssClass' => 'text-secondary'
        ])?>

        <?= $form1->field($socialModel,'username')->input('text',['required'=>'required'])->label("Nom d'utilisateur") ?>
        <?= $form1->field($socialModel,'first_name')->input('text',['required' => 'required'])->label('Prénom') ?>
        <?= $form1->field($socialModel,'name')->input('text',['required' => 'required'])->label('Nom') ?>
        <?= $form1->field($socialModel,'tel')->input('tel',['required'=>'required'])->label("Téléphone") ?>
        <?= $form1->field($socialModel,'email')->input('email',['required'=> 'required'])->label('Email')?>
        <?= $form1->field($socialModel,'address')->input('address')->label('Adresse')?>
        <?= $form1->field($socialModel,'avatar')->fileInput();?>

        <div class="form-group text-right">
            <button class="btn-primary btn" data-toggle="modal" data-target="#changePassword" >Modifier mot de passe</button>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>

        <?php \yii\widgets\ActiveForm::end()?>

    </div>
</div>
<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="changePasswordLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="background-color: #fff;">
        <?php $form2 = \yii\widgets\ActiveForm::begin(['method' => 'post',
                'action' =>  '@administrator.update_social_information',
                'options' => ['enctype' => 'multipart/form-data','class' => 'modal-body'],
                'errorCssClass' => 'text-secondary'
            ])?>
            <?= $form2->field($passwordModel,'password')->input('password',['required'=> 'required'])->label('Ancien mot de passe') ?>
            <?= $form2->field($passwordModel,'new_password')->input('password',['required'=> 'required'])->label('Nouveau mot de passe') ?>
            <?= $form2->field($passwordModel,'confirmation_new_password')->input('password',['required'=>'required'])->label('Confirmation du nouveau mot de passe') ?>

            <div class="form-group text-right modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">retour</button>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
         <?php \yii\widgets\ActiveForm::end()?>
    </div>
</div>