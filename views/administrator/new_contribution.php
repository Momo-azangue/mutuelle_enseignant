<?php $this->beginBlock('title') ?>
    Nouvelle contribution
<?php $this->endBlock() ?>
<?php $this->beginBlock('style') ?>
    <style>
    </style>
<?php $this->endBlock() ?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-12 mb-3">
            <h3  class="text-center text-muted">Nouvelle contribution</h3>
        </div>
        <?php
        $form = \yii\widgets\ActiveForm::begin([
            'errorCssClass' => 'text-secondary',
            'options' => ['class' => 'col-md-8 col-12 white-block'],
            'action' => '@administrator.add_contribution',
            'method' => 'post'
        ]);

        $members = \app\models\Contribution::find()->where(['help_id' =>$model->help_id,'state' => false])->select('member_id')->column();

        $members = \app\models\Member::findAll(['id' => $members]);

        $items = [];

        foreach ($members as $member) {
            $user = $member->user();
            $items[$member->id] = $user->name." ".$user->first_name;
        }
        ?>

        <?= $form->field($model,'help_id')->hiddenInput()->label(false) ?>
        <?= $form->field($model,'member_id')->dropDownList($items,['required'=> 'required'])->label("Contributeur")?>
        <?= $form->field($model,"date")->input("date",['required'=> 'required'])->label("Date de contribution");?>

        <div class="form-group text-right">
            <button class="btn btn-primary" type="submit">Enregistrer</button>
        </div>
        <?php
        \yii\widgets\ActiveForm::end()
        ?>
    </div>
</div>
